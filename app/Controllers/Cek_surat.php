<?php

namespace App\Controllers;


class Cek_surat extends BaseController
{
    public function __construct()
    {
        $this->pengajuanPenelitian          = new \App\Models\M_PengajuanPenelitian();
        $this->pengajuanSuratTugas          = new \App\Models\M_PengajuanSuratTugas();
        $this->studiPendahuluan             = new \App\Models\M_StudiPendahuluan();
        $this->ujiValiditas                 = new \App\Models\M_UjiValiditas();
        $this->nomor_surat                  = new \App\Models\Nomor_surat();

        $this->surat_tugas_hki              = new \App\Models\M_Surat_Tugas_Hki();
        $this->surat_tugas_publikasi        = new \App\Models\M_Surat_Tugas_Publikasi();
        $this->oral_presentasi              = new \App\Models\M_Oral_Presentasi();
        $this->izin_ethical_clearance       = new \App\Models\M_Izin_Ethical_Clearance();
        $this->izin_penelitian              = new \App\Models\M_Izin_Penelitian();
        $this->izin_pengabdian_masyarakat   = new \App\Models\M_Surat_Izin_Pengabdian_Masyarakat();
        $this->determinasi_tanaman          = new \App\Models\M_Determinasi_Tanaman();
        $this->tugas_pengabdian             = new \App\Models\M_Tugas_Pengabdian();
        $this->tugas_penelitian             = new \App\Models\M_Tugas_Penelitian();
    }

    public function cek_status_surat(){
        $nama           = $this->request->getVar('nama');
        $nim_atau_nidn  = $this->request->getVar('nim_atau_nidn');
        $jenis_surat    = $this->request->getVar('jenis_surat');

        if($jenis_surat == 'studi_pendahuluan'){
            $data = [
                'data'     => $this->studiPendahuluan->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'studi pendahuluan'
            ];
            return view('publik/cek_surat/h_cek_surat', $data);
        }else if($jenis_surat == 'pengajuan_penelitian'){
            $data = [
                'data'     => $this->pengajuanPenelitian->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Pengajuan Penelitian'
            ];
            return view('publik/cek_surat/h_cek_surat_pengajuan_penelitian', $data);
        }else if($jenis_surat == 'uji_validitas'){
            $data = [
                'data'     => $data = $this->ujiValiditas->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Uji Validitas'
            ];
            return view('publik/cek_surat/h_cek_surat', $data);
        }else if($jenis_surat == 'determinasi_tanaman'){
            $data = [
                'data'     => $this->determinasi_tanaman->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Determinasi Tanaman'
            ];
            return view('publik/cek_surat/h_cek_surat_pengajuan_penelitian', $data);
        }else if($jenis_surat == 'surat_tugas_hki'){
            $data = [
                'data'     => $this->surat_tugas_hki->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Tugas HKI'
            ];
            return view('publik/cek_surat/h_cek_surat_hki', $data);
        }else if($jenis_surat == 'surat_tugas_publikasi'){
            $data = [
                'data'     => $this->surat_tugas_publikasi->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Tugas Publikasi'
            ];
            return view('publik/cek_surat/h_cek_surat_hki', $data);
        }else if($jenis_surat == 'surat_oral_presentasi'){
            $data = [
                'data'     => $this->oral_presentasi->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Tugas Oral Presentasi'
            ];
            return view('publik/cek_surat/h_cek_surat_oral', $data);
        }else if($jenis_surat == 'surat_izin_ethical_clearance'){
            $data = [
                'data'     => $this->izin_ethical_clearance->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Tugas Ethical Clearance'
            ];
            return view('publik/cek_surat/h_cek_surat_ethical', $data);
        }else if($jenis_surat == 'surat_izin_penelitian'){
            $data = [
                'data'     => $this->izin_penelitian->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Izin Penelitian'
            ];
            return view('publik/cek_surat/h_cek_surat_hki', $data);
        }else if($jenis_surat == 'surat_izin_pengabdian_masyarakat'){
            $data = [
                'data'     => $this->izin_pengabdian_masyarakat->cek_pengajuan_surat($nim_atau_nidn),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Izin Pengabdian Masyarakat'
            ];
            return view('publik/cek_surat/h_cek_surat_hki', $data);
        }else if($jenis_surat == 'surat_tugas_pengabdian'){
            $data = [
                'data'     => $this->tugas_pengabdian->cek_pengajuan_surat($nama),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Tugas Pengabdian'
            ];
            return view('publik/cek_surat/h_cek_surat_tugas_pengabdian', $data);
        }else if($jenis_surat == 'surat_tugas_penelitian'){
            $data = [
                'data'     => $this->tugas_penelitian->cek_pengajuan_surat($nama),
                'kategori' => 'Cek Surat',
                'slug'     => 'cek surat',
                'kode'     => 'Surat Tugas Pengabdian'
            ];
            return view('publik/cek_surat/h_cek_surat_tugas_pengabdian', $data);
        }else {
            return redirect()->to(base_url().'/home/cek_status_surat')->with('error_status_surat', 'Jenis Surat Tidak Ditemukan');
        }
    }
}

