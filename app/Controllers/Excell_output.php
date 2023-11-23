<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excell_output extends BaseController
{
    public function __construct()
    {
        $this->nomor_surat          = new \App\Models\Nomor_surat();
        $this->form_validation      = \Config\Services::validation();
    }

    public function export_excell(){
        $dari_bulan = $this->request->getPost('dari_bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'dari_bulan' => $dari_bulan,
            'tahun' => $tahun
        ];

        if($dari_bulan == 'CETAK_SEMUA'){
           $data = $this->nomor_surat->cetak_semua($tahun);
           // header nama kolom
           $spreed = new Spreadsheet();
           $spreed->setActiveSheetIndex(0)
                  ->setCellValue('A2','LAPORAN SURAT MASUK TAHUN '.$tahun)
                  ->setCellValue('A3','LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT')
                  ->setCellValue('A4','UNIVERSITAS MUHAMMADIYAH PEKAJANGAN PEKALONGAN (UMPP)')
                  ->setCellValue('A6','No')
                  ->setCellValue('B6','Nomor Surat')
                  ->setCellValue('C6','Nama Pemilik')
                  ->setCellValue('D6','Perihal')
                  ->setCellValue('E6','Ditujukan Kepada');

            $spreed->getActiveSheet()->mergeCells('A2:E2');
            $spreed->getActiveSheet()->mergeCells('A3:E3');
            $spreed->getActiveSheet()->mergeCells('A4:E4');
            $spreed->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
            $spreed->getActiveSheet()->getStyle('A3:E3')->getFont()->setBold(true);
            $spreed->getActiveSheet()->getStyle('A4:E4')->getFont()->setBold(true);
            $spreed->getActiveSheet()->getStyle('A6:E6')->getFont()->setBold(true);
            $spreed->getActiveSheet()->getStyle('A2:E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreed->getActiveSheet()->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreed->getActiveSheet()->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreed->getActiveSheet()->getStyle('A6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreed->getActiveSheet()->getStyle('B6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreed->getActiveSheet()->getStyle('C6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreed->getActiveSheet()->getStyle('D6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreed->getActiveSheet()->getStyle('E6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $colum = 7;
            $no = 1;
            foreach($data as $d){
                $spreed->setActiveSheetIndex(0)
                    ->setCellValue('A'.$colum, $no)
                    ->setCellValue('B'.$colum, $d['nomor_surat'])
                    ->setCellValue('C'.$colum, $d['nama_pemilik_surat'])
                    ->setCellValue('D'.$colum, $d['hal'])
                    ->setCellValue('E'.$colum, $d['ditujukan_kepada']);

                $spreed->getActiveSheet()->getStyle('A'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getColumnDimension('A')->setWidth(40, 'px');
                $spreed->getActiveSheet()->getStyle('A'.$colum)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreed->getActiveSheet()->getStyle('B'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getColumnDimension('B')->setWidth(155, 'px');
                $spreed->getActiveSheet()->getStyle('C'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getColumnDimension('C')->setWidth(315, 'px');
                $spreed->getActiveSheet()->getStyle('D'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getColumnDimension('D')->setWidth(245, 'px');
                $spreed->getActiveSheet()->getStyle('E'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getColumnDimension('E')->setWidth(445, 'px');
                $colum++;
                $no++;

            }
            // save ke format excell
            $writer = new Xlsx($spreed);
            $fileName = 'Laporan Surat Masuk Tahun'.$tahun;

            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }else{
            if($this->form_validation->run($data, 'export_error_pdf') == FALSE){
                session()->setFlashData('error_export_pdf', $this->form_validation->getErrors());
                return redirect()->to(base_url().'/admin/export_laporan');
            }else{
                $d = [
                    'tahun' => $tahun,
                    'bulan' => $dari_bulan
                ];
                $data = $this->nomor_surat->cetak($d);
                $spreed = new Spreadsheet();
                $spreed->setActiveSheetIndex(0)
                        ->setCellValue('A2','LAPORAN SURAT MASUK '. $dari_bulan .' TAHUN '.$tahun)
                        ->setCellValue('A3','LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT')
                        ->setCellValue('A4','UNIVERSITAS MUHAMMADIYAH PEKAJANGAN PEKALONGAN (UMPP)')
                        ->setCellValue('A6','No')
                        ->setCellValue('B6','Nomor Surat')
                        ->setCellValue('C6','Nama Pemilik')
                        ->setCellValue('D6','Perihal')
                        ->setCellValue('E6','Ditujukan Kepada');

                $spreed->getActiveSheet()->mergeCells('A2:E2');
                $spreed->getActiveSheet()->mergeCells('A3:E3');
                $spreed->getActiveSheet()->mergeCells('A4:E4');
                $spreed->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
                $spreed->getActiveSheet()->getStyle('A3:E3')->getFont()->setBold(true);
                $spreed->getActiveSheet()->getStyle('A4:E4')->getFont()->setBold(true);
                $spreed->getActiveSheet()->getStyle('A6:E6')->getFont()->setBold(true);
                $spreed->getActiveSheet()->getStyle('A2:E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreed->getActiveSheet()->getStyle('A3:E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreed->getActiveSheet()->getStyle('A4:E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreed->getActiveSheet()->getStyle('A6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getStyle('B6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getStyle('C6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getStyle('D6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreed->getActiveSheet()->getStyle('E6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                $colum = 7;
                $no = 1;
                foreach($data as $d){
                    $spreed->setActiveSheetIndex(0)
                        ->setCellValue('A'.$colum, $no)
                        ->setCellValue('B'.$colum, $d['nomor_surat'])
                        ->setCellValue('C'.$colum, $d['nama_pemilik_surat'])
                        ->setCellValue('D'.$colum, $d['hal'])
                        ->setCellValue('E'.$colum, $d['ditujukan_kepada']);
    
                    $spreed->getActiveSheet()->getStyle('A'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreed->getActiveSheet()->getColumnDimension('A')->setWidth(40, 'px');
                    $spreed->getActiveSheet()->getStyle('A'.$colum)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $spreed->getActiveSheet()->getStyle('B'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreed->getActiveSheet()->getColumnDimension('B')->setWidth(155, 'px');
                    $spreed->getActiveSheet()->getStyle('C'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreed->getActiveSheet()->getColumnDimension('C')->setWidth(315, 'px');
                    $spreed->getActiveSheet()->getStyle('D'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreed->getActiveSheet()->getColumnDimension('D')->setWidth(245, 'px');
                    $spreed->getActiveSheet()->getStyle('E'.$colum)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreed->getActiveSheet()->getColumnDimension('E')->setWidth(445, 'px');
                    $colum++;
                    $no++;
                }
                // save ke format excell
                $writer = new Xlsx($spreed);
                $fileName = 'Laporan Surat Masuk Bulan'. $dari_bulan .' Tahun'.$tahun;
    
                // Redirect hasil generate xlsx ke web client
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
                header('Cache-Control: max-age=0');
    
                $writer->save('php://output');
            }
        }
    }

}