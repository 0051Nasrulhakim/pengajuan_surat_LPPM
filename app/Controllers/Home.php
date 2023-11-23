<?php

namespace App\Controllers;

class Home extends BaseController
{

// dashboard
    public function index()
    {
        $data = [
            'slug'      => "Dashboard",
            'kategori'  => "Dashboard"
        ];
        return view('publik/konten/dashboard', $data);
    }


// end dashboard

// cek surat
    public function cek_status_surat(){
        $data = [
            'slug'      => "Cek Surat",
            'kategori'  => "Cek Surat"
        ];
        return view('publik/konten/cek_status', $data);
    }
    public function status(){
        $data = [
            'slug'      => "Cek Surat",
            'kategori'  => "Cek Surat"
        ];
        return view('publik/konten/h_cek_surat', $data);
    }
// end cek surat

/*

-
-
-

*/

// MODUL MAHASISWA
    // STUDI PENDAHULUAN
    public function studiPendahuluan(){
        $data = [
            'slug'      => "Studi Pendahuluan",
            'kategori'  => "Mahasiswa"
        ];
        return view('publik/konten/studiPendahuluan', $data);
    }

    public function selesai(){
        if(session()->get('perihal') != ""){
            $data = [
                'slug'      => "Studi Pendahuluan",
                'kategori'  => "Mahasiswa"
            ];
            return view('publik/laporan_sukses/laporan_sukses', $data);
        }else{
            return redirect()->to(base_url().'/home');
        }
    }

    public function selesai_penelitian(){
        if(session()->get('perihal') != ""){
            $data = [
                'slug'      => "Pengajuan Penelitian",
                'kategori'  => "Mahasiswa"
            ];
            return view('publik/laporan_sukses/laporan_sukses', $data);
        }else{
            return redirect()->to(base_url().'/home');
        }
    }
    public function selesai_validitas(){
        if(session()->get('perihal') != ""){
            $data = [
                'slug'      => "Uji Validitas",
                'kategori'  => "Mahasiswa"
            ];
            return view('publik/laporan_sukses/laporan_sukses', $data);
        }else{
            return redirect()->to(base_url().'/home');
        }
    }

    public function selesai_determinasi(){
        if(session()->get('perihal') != ""){
            $data = [
                'slug'      => "Determinasi Tanaman",
                'kategori'  => "Mahasiswa"
            ];
            return view('publik/laporan_sukses/laporan_sukses', $data);
        }else{
            return redirect()->to(base_url().'/home');
        }
    }
    
    
    // PENGAJUAN PENELITIAN
    public function pengajuan()
    {
        $data = [
            'slug'      => "Pengajuan Penelitian",
            'kategori'  => "Mahasiswa",
        ];
        return view('publik/konten/pengajuan', $data);
    }

    // UJI VALIDITAS
    public function ujiValiditas()
    {
        $data = [
            'slug'      => "Uji Validitas",
            'kategori'  => "Mahasiswa",
        ];
        return view('publik/konten/ujiValiditas', $data);
    }

    // DETERMINASI TANAMAN
    public function determinasi_tanaman(){
        $data = [
            'slug'      => "Determinasi Tanaman",
            'kategori'  => "Mahasiswa",
        ];
        return view('publik/konten/determinasi_tanaman', $data);
    }
    
// END MODUL MAHASISWA

/*

-
-
-

*/

// MODUL DOSEN
    // MEMO SURAT TUGAS HKI
    public function surat_tugas_hki(){
        $data =[
            'slug'      => "Surat Tugas Hki",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/surat_tugas_hki',$data);
    }

    // MEMO SURAT TUGAS PUBLIKASI
    public function surat_tugas_publikasi(){
        $data =[
            'slug'      => "Surat Tugas Publikasi",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/surat_tugas_publikasi',$data);
    }

    // TURAT TUGAS ORAL PRESENTASI
    public function surat_tugas_oral_presentasi(){
        $data =[
            'slug'      => "Surat Tugas Oral Presentasi",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/surat_tugas_oral_presentasi', $data);
    }

    // SURAT IZIN ETHICAL CLEARENCE
    public function izin_ethical_clearance(){
        $data = [
            'slug'      => "Izin Ethical Clearance",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/izin_ethical_clearance', $data);
    }

    // SURAT IZIN PENELITIAN
    public function surat_izin_penelitian(){
        $data = [
            'slug'      => "Izin Penelitian",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/surat_izin_penelitian', $data);
    }

    // SURAT IZIN PENGABDIAN MASYARAKAT
    public function pengabdian_masyarakat(){
        $data = [
            'slug'      => "Izin Pengabdian Masyarakat",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/pengabdian_masyarakat', $data);
    }

    // SURAT TUGAS PENGABDIAN
    public function tugas_pengabdian(){
        $data = [
            'slug'      => "Tugas Pengabdian Masyarakat",
            'kategori'  => "Dosen",
        ];
        return view('publik/konten/tugas_pengabdian', $data);
    }

    // SURAT TUGAS PENELITIAN
    public function tugas_penelitian(){
        $data = [
            'slug'      => "Tugas Penelitian",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/tugas_penelitian', $data);
    }

// END MODUL DOSEN

/*

-
-
-

*/

// TIDAK TERPAKAI
    public function dosen_suratTugas()
    {
        $data = [
            'slug'      => "Surat Tugas",
            'kategori'  => "Dosen"
        ];
        return view('publik/konten/dosen_suratTugas', $data);
    }
// END TIDAK TERPAKAI


    public function test(){
        return view('publik/konten/tes');
    }
}
