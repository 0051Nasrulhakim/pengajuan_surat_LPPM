<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Pdf_output extends BaseController
{
    public function __construct()
    {
        $this->form_validation              = \Config\Services::validation();
        $this->getDataPengajuan = new \App\Models\M_PengajuanPenelitian();
        $this->getDataPengajuanSuratTugas = new \App\Models\M_PengajuanSuratTugas();
        $this->studiPendahuluan = new \App\Models\M_StudiPendahuluan(); 
        $this->ujiValiditas = new \App\Models\M_UjiValiditas(); 

        $this->surat_tugas_hki              = new \App\Models\M_Surat_Tugas_Hki();
        $this->surat_tugas_publikasi        = new \App\Models\M_Surat_Tugas_Publikasi();
        $this->oral_presentasi              = new \App\Models\M_Oral_Presentasi();
        $this->izin_ethical_clearance       = new \App\Models\M_Izin_Ethical_Clearance();
        $this->izin_penelitian              = new \App\Models\M_Izin_Penelitian();
        $this->izin_pengabdian_masyarakat   = new \App\Models\M_Surat_Izin_Pengabdian_Masyarakat();
        $this->determinasi_tanaman          = new \App\Models\M_Determinasi_Tanaman();
        $this->tugas_pengabdian             = new \App\Models\M_Tugas_Pengabdian();
        $this->tugas_penelitian             = new \App\Models\M_Tugas_Penelitian();
        $this->nomor_surat                  = new \App\Models\Nomor_surat();
    }
    public function index(){
        $gambar = 'data:image;base64,'.base64_encode(@file_get_contents('logo.png'));
        $umpp = 'data:image;base64,'.base64_encode(@file_get_contents('umpp.png'));
        $data = [
            'gambar' => $gambar,
            'umpp'  => $umpp,
        ];
        return view('publik/konten/pdf_output',$tes=['data' => $data]);
        
    }

    public function cetak($id){
        $nomor_surat = $_GET['nomorsurat'];
        if($nomor_surat != NULL){
            $filename = $nomor_surat. " - " .date('Y-m-d H:i:s');
            $gambar = 'data:image;base64,'.base64_encode(@file_get_contents('logo.png'));
            $umpp = 'data:image;base64,'.base64_encode(@file_get_contents('umpp.png'));
            $data = [
                'nomor_surat' => $nomor_surat,
                'gambar'        => $gambar,
                'umpp'          => $umpp,
                'data'          => $this->getDataPengajuanSuratTugas->find([$id]),
            ];
            // dd($data);
            $html = view('publik/konten/pdf_output', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => true));
            exit();
        }else{
            // session()->setFlashData('surat_masukBelum', 'Silahkan Masukkan Nomor Surat');
            return redirect()->to(base_url().'/admin/lihat/'.$id)->with('pesan_error_nomor_surat', 'Nomor Surat Belum Diisi');
        }
    }
    
    public function preview($id){
        $nomor_surat = $_GET['nomorsurat'];
        if($nomor_surat != NULL){
            $filename = $nomor_surat. " - " .date('Y-m-d H:i:s');
            $gambar = 'data:image;base64,'.base64_encode(@file_get_contents('logo.png'));
            $umpp = 'data:image;base64,'.base64_encode(@file_get_contents('umpp.png'));
            $data = [
                'nomor_surat' => $nomor_surat,
                'gambar'        => $gambar,
                'umpp'          => $umpp,
                'data'          => $this->getDataPengajuanSuratTugas->find([$id]),
            ];
            // dd($data);
            $html = view('publik/konten/pdf_output', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            // session()->setFlashData('surat_masukBelum', 'Silahkan Masukkan Nomor Surat');
            return redirect()->to(base_url().'/admin/lihat/'.$id)->with('pesan_error_nomor_surat', 'Nomor Surat Belum Diisi');
        }
    }
    
    // sudi pendahuluan

    public function preview_studiPendahuluan($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - " .date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $gambar     = 'data:image;base64,'.base64_encode(@file_get_contents('logo.png'));
            $umpp       = 'data:image;base64,'.base64_encode(@file_get_contents('umpp.png'));
            $data = [
                'bismillah'     => $bismillah,
                'gambar'        => $gambar,
                'umpp'          => $umpp,
                'data'          => $this->studiPendahuluan->find([$id]),      
            ];
            // dd($data);
            $html = view('publik/konten/pdf_output_studiPendahuluan', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_studiPendahuluan/'.$id)->with('pesan_error_studi_pendahuluan', 'Nomor Surat Belum Diisi');
        }
        // return view('publik/konten/pdf_output_studiPendahuluan', $tes=['data' => $data]);
    }

    public function preview_penelitian($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - " .date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $gambar     = 'data:image;base64,'.base64_encode(@file_get_contents('logo.png'));
            $umpp       = 'data:image;base64,'.base64_encode(@file_get_contents('umpp.png'));
            $data = [
                'bismillah'     => $bismillah,
                'gambar'        => $gambar,
                'umpp'          => $umpp,
                'data'          => $this->getDataPengajuan->find([$id]),
            ];
            // dd($data);
            $html = view('publik/konten/pdf_output', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            // session()->setFlashData('surat_masukBelum', 'Silahkan Masukkan Nomor Surat');
            return redirect()->to(base_url().'/admin/lihatPengajuanPenelitian/'.$id)->with('pesan_error_nomor_surat_penelitian', 'Nomor Surat Belum Diisi');
        }
    }

    public function preview_ujiValiditas($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - " .date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $gambar     = 'data:image;base64,'.base64_encode(@file_get_contents('logo.png'));
            $umpp       = 'data:image;base64,'.base64_encode(@file_get_contents('umpp.png'));
            $data = [
                'bismillah'     => $bismillah,
                'gambar'        => $gambar,
                'umpp'          => $umpp,
                'data'          => $this->ujiValiditas->find([$id]),      
            ];
            // dd($data);
            $html = view('publik/konten/pdf_output_studiPendahuluan', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_ujiValiditas/'.$id)->with('pesan_error_ujiValiditas_error', 'Nomor Surat Belum Diisi');
        }
        // return view('publik/konten/pdf_output_studiPendahuluan', $tes=['data' => $data]);
    }

// MODUL DOSEN
    // VIEW PDF SURAT TUGAS HKI 
    public function preview_suratHKI($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - " . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->surat_tugas_hki->find([$id]),      
            ];
            $html = view('admin/pdf_output/suratHKI', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_suratHKI/'.$id)->with('pesan_error_nomor_surat_hki', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    

    // DETERMINASI TANAMAN
    public function preview_determinasi_tanaman($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - " . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->determinasi_tanaman->find([$id]),      
            ];
            $html = view('admin/pdf_output/determinasi_tanaman', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_determinasiTanaman/'.$id)->with('pesan_error_nomor_surat_determinasi_tanaman', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    // SURAT TUGAS PUBLIKASI
    public function preview_suratPublikasi($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->surat_tugas_publikasi->find([$id]),      
            ];
            $html = view('admin/pdf_output/surat_tugas_publikasi', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_suratPublikasi/'.$id)->with('pesan_error_nomor_surat_tugas_publikasi', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    // SURAT TUGAS ORAL PRESNTASI
    public function preview_oralPresentasi($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->oral_presentasi->find([$id]),      
            ];
            $html = view('admin/pdf_output/surat_tugas_oral', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_oralPresentasi/'.$id)->with('pesan_error_nomor_surat_tugas_oral', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    // SURAT TUGAS PENGABDIAN
    public function preview_tugasPengabdian($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->tugas_pengabdian->find([$id]),      
            ];
            $html = view('admin/pdf_output/tugas_pengabdian', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_tugas_pengabdian/'.$id)->with('pesan_error_nomor_surat_tugas_pengabdian', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }
    
    // TUGAS PENELITIAN
    public function preview_tugasPenelitian($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->tugas_penelitian->find([$id]),      
            ];
            $html = view('admin/pdf_output/tugas_penelitian', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_tugasPenelitian/'.$id)->with('pesan_error_nomor_surat_tugas_penelitian', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    // ethical clearence
    public function preview_ethical($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->izin_ethical_clearance->find([$id]),      
            ];
            $html = view('admin/pdf_output/ethical_clearence', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_ethical/'.$id)->with('pesan_error_nomor_surat_ethical_clearence', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    // IZIN PENELITIAN
    public function preview_izinPenelitian($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->izin_penelitian->find([$id]),      
            ];
            $html = view('admin/pdf_output/izin_penelitian', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_izinPenelitian/'.$id)->with('pesan_error_nomor_surat_izin_penelitian', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }
    // PENGABDIAN MASYARAKAT
    public function preview_pengabdianMasyarakat($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->izin_pengabdian_masyarakat->find([$id]),      
            ];
            $html = view('admin/pdf_output/pengabdian_masyarakat', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_pengabdianMasyarakat/'.$id)->with('pesan_error_nomor_surat_pengabdian_masyarakat', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }

    public function export_pdf(){
        $dari_bulan     = $this->request->getVar('dari_bulan');
        $tahun          = $this->request->getPost('tahun');
        $data = [
            'dari_bulan'    => $dari_bulan,
            'tahun'         => $tahun
        ];
        if($dari_bulan == 'CETAK_SEMUA'){
            if($this->form_validation->run($data, 'export_error_pdf') == FALSE){
                session()->setFlashData('error_export_pdf', $this->form_validation->getErrors());
                return redirect()->to(base_url().'/admin/export_laporan');
            }else{
                $filename   = "LAPORAN SURAT TAHUN ".$tahun;
                $data = [
                    'data'          => $this->nomor_surat->cetak_semua($tahun)      
                ];
                $html = view('admin/pdf_output/cetak_laporan_satutahun', $tes=['data' => $data]);
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('a4', 'landscape');
                $dompdf->render();
                $dompdf->stream($filename, array("Attachment" => false));
                exit();
            }
        }else{
            if($this->form_validation->run($data, 'export_error_pdf') == FALSE){
                session()->setFlashData('error_export_pdf', $this->form_validation->getErrors());
                return redirect()->to(base_url().'/admin/export_laporan');
            }else{
                $filename   = "LAPORAN SURAT BULAN ".$dari_bulan.' TAHUN '.$tahun;
                $d = [
                    'tahun' => $tahun,
                    'bulan' => $dari_bulan
                ];
                $data = [
                    'bulan'         => $dari_bulan,
                    'tahun'         => $tahun,
                    'd'             => $this->nomor_surat->cetak($d)      
                ];
                $html = view('admin/pdf_output/cetak_laporan_perbulan', $tes=['data' => $data]);
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('a4', 'landscape');
                $dompdf->render();
                $dompdf->stream($filename, array("Attachment" => false));
                exit();
            }
        }
        // dd($data);
        
    }

// END MODUL DOSEN


// export laporan selesai
    public function selesai(){
        $perihal = session()->get('perihal');
        $nama = session()->get('nama');
        $nim  = session()->get('nim');
        $fakultas = session()->get('fakultas');
        $prodi   = session()->get('prodi');
        $tahun_akademik = session()->get('tahun_akademik');
        $dosen_pembimbing = session()->get('dosen_pembimbing');
        $tanggal_pengajuan = session()->get('tanggal_pengajuan');
        $judul_penelitian = session()->get('judul_penelitian');
        

        $filename   = "FORM ".$perihal;
        $data = [
            'perihal'        => $perihal,
            'nama'           => $nama,
            'nim'            => $nim,
            'fakultas'       => $fakultas,
            'prodi'          => $prodi,
            'tahun_akademik' => $tahun_akademik,
            'dosen_pembimbing'  => $dosen_pembimbing,
            'tanggal_pengajuan' => $tanggal_pengajuan,
            'judul_penelitian'  => $judul_penelitian
        ];
        $html = view('publik/cetak_form/cetak_form', $tes=['data' => $data]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('a4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
    }

    public function tutorial_pengisian(){
        $filename   = "Tutorial Pengisian Form pengajuan Surat DI Website LPPM";
        $gambar1= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_1.jpg'));
        $gambar2= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_2.jpg'));
        $gambar3= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_3.jpg'));
        $gambar4= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_4.jpg'));
        $gambar5= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_5.jpg'));
        $gambar6= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_6.jpg'));
        $gambar7= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_7.jpg'));
        $gambar8= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_8.jpg'));
        $gambar9= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_9.jpg'));
        $gambar18= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_18.jpg'));
        $gambar19= 'data:image;base64,'.base64_encode(@file_get_contents('assets/publik/tutorial/form_19.jpg'));
        $data = [
            'gambar1'        => $gambar1,
            'gambar2'        => $gambar2,
            'gambar3'        => $gambar3,
            'gambar4'        => $gambar4,
            'gambar5'        => $gambar5,
            'gambar6'        => $gambar6,
            'gambar7'        => $gambar7,
            'gambar8'        => $gambar8,
            'gambar9'        => $gambar9,
            'gambar18'        => $gambar18,
            'gambar19'        => $gambar19
        ];
        $html = view('publik/konten/tutorial', $tes=['data' => $data]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('a4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => false));
    }




    // tidak terpakai 
    // DOWNLOAD PDF SURAT TUGAS HKI
    public function download_SuratHKI($id){
        $nomor_surat = $_GET['nomor_surat'];
        if($nomor_surat != NULL){
            $filename   = $nomor_surat. " - "  . date('Y-m-d H:i:s');
            $bismillah  = 'data:image;base64,'.base64_encode(@file_get_contents('bismillah_3.png'));
            $data = [
                'bismillah'     => $bismillah,
                'data'          => $this->surat_tugas_hki->find([$id]),      
            ];
            $html = view('admin/pdf_output/suratHKI', $tes=['data' => $data]);
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('a4', 'potrait');
            $dompdf->render();
            $dompdf->stream($filename, array("Attachment" => false));
            exit();
        }else{
            return redirect()->to(base_url().'/admin/lihat_suratHKI/'.$id)->with('pesan_error_nomor_surat_hki', 'Nomor Surat Belum Diisi silahkan masuk ke halaman edit');
        }
    }


}