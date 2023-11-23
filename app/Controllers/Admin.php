<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->nomor_surat                  = new \App\Models\Nomor_surat();

        $this->getDataPengajuan             = new \App\Models\M_PengajuanPenelitian();
        $this->getDataPengajuanSuratTugas   = new \App\Models\M_PengajuanSuratTugas();
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
        $this->user                         = new \App\Models\M_User();
    }
    public function index()
    {
        $data = [
            'slug'      => "Dashboard",
            'kategori'  => "Dashboard"
        ];
        return view('admin/konten/dashboard', $data);
    }

    public function user_page(){
        $data = [
            'slug'      => "User Page",
            'kategori'  => "TOOLS",
            'data'      => $this->user->findAll()
        ];
        return view('admin/konten/tools/user', $data);
    }

    public function tambah_user(){
        $data = [
            'slug'      => "User Page",
            'kategori'  => "TOOLS",
        ];
        return view('admin/konten/tools/tambah_user', $data);
    }

    public function edit_user($id){
        $data = [
            'slug'      => "User Page",
            'kategori'  => "TOOLS",
            'data'      => $this->user->find([$id])
        ];
        return view('admin/konten/tools/edit_user', $data);
    }

    public function pengajuanPenelitian(){
        $data = [
            'slug'          => "Pengajuan Penelitian",
            'kategori'      => "Mahasiswa",
            'data'          => $this->getDataPengajuan->getPenelitianBelumTercetak(),
            'belum_cetak'   => $this->getDataPengajuan->getPenelitianSudahTercetak()
        ];
        //  dd($data);
        return view('admin/konten/pengajuanPenelitian', $data);
    }
    
    public function lihat($id){
        $data = [
            'slug'      => "Surat Tugas",
            'kategori'  => "Dosen",
            'data'      => $this->getDataPengajuanSuratTugas->find([$id]),
        ];

        // dd($data);
        return view('admin/konten/lihat', $data);
    }

    //
    // studi pendahuluan
    //
    public function studiPendahuluan(){
        $data = [
            'slug'      => "Studi Pendahuluan",
            'kategori'  => "Mahasiswa",
            'data'      => $this->studiPendahuluan->belum_tercetak(),
            'tercetak'  => $this->studiPendahuluan->tercetak(),
        ];
        // dd($data);
        return view('admin/konten/studiPendahuluan', $data);
    }

    public function lihat_studiPendahuluan($id){
        $data = [
            'slug'      => "Studi Pendahuluan",
            'kategori'  => "Mahasiswa",
            'data'      => $this->studiPendahuluan->find([$id]),
            
        ];

        // dd($data);
        return view('admin/konten/lihat_studiPendahuluan', $data);
    }

    public function edit_studiPendahuluan($id){
        $data = [
            'slug'      => "Studi Pendahuluan",
            'kategori'  => "Mahasiswa",
            'data'      => $this->studiPendahuluan->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()   
        ];

        // dd($data);
        return view('admin/konten/edit_studiPendahuluan', $data);
    }
    public function selesaiStudiPendahuluan($id){
        $kirim="2";
        $this->studiPendahuluan->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        return redirect()->to(base_url().'/admin/studiPendahuluan');
    }

    // end studi pendahuluan

    public function lihatPengajuanPenelitian($id){
        $data = [
            'slug'      => "Pengajuan Penelitian",
            'kategori'  => "Mahasiswa",
            'data'      => $this->getDataPengajuan->find([$id]),
        ];

        // dd($data);
        return view('admin/konten/lihat_pengajuanPenelitian', $data);
    }
    
    public function ujiValiditas(){
        $data = [
            'slug'      => "Uji Validitas",
            'kategori'  => "Mahasiswa",
            'data'      => $this->ujiValiditas->belum_tercetak(),
            'tercetak'  => $this->ujiValiditas->tercetak(),
            
        ];
        // dd($data);
        return view('admin/konten/ujiValiditas', $data);
    }

    public function lihat_ujiValiditas($id){
        $data = [
            'slug'      => "Uji Validitas",
            'kategori'  => "Mahasiswa",
            'data'      => $this->ujiValiditas->find([$id]),
        ];
        // dd($data);
        return view('admin/konten/lihat_ujiValiditas', $data);
    }

    public function edit_ujiValiditas($id){
        $data = [
            'slug'      => "Uji Validitas",
            'kategori'  => "Mahasiswa",
            'data'      => $this->ujiValiditas->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()   
        ];
        return view('admin/konten/edit_ujiValiditas', $data);
    }

    public function determinasi_tanaman(){
        $data = [
            'slug'      => "Determinasi Tanaman",
            'kategori'  => "Mahasiswa",
            'data'      => $this->determinasi_tanaman->belum_tercetak(),
            'tercetak'  => $this->determinasi_tanaman->tercetak(),
            
        ];
        // dd($data);
        return view('admin/konten/determinasi_tanaman', $data);
    }

    public function lihat_determinasiTanaman($id){
        $data = [
            'slug'      => "Determinasi Tanaman",
            'kategori'  => "Mahasiswa",
            'data'      => $this->determinasi_tanaman->find([$id])
        ];
        return view('admin/konten/lihat_determinasiTanaman', $data);
    }

    public function edit_determinasiTanaman($id){
        $data = [
            'slug'      => "Determinasi Tanaman",
            'kategori'  => "Mahasiswa",
            'data'      => $this->determinasi_tanaman->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()   
        ];
        return view('admin/konten/edit_determinasiTanaman', $data);
    }

    /*
        dosen
    */
    
    // surat tugas
    public function suratTugas(){
        $data = [
            'slug'          => "Surat Tugas",
            'kategori'      => "Dosen",
            'data'          => $this->getDataPengajuanSuratTugas->getSuratTugasBelumTercetak(),
            'sudah_cetak'   => $this->getDataPengajuanSuratTugas->getSuratTugasTercetak()
        ];
        //  dd($data);
        return view('admin/konten/dosen_suratTugas', $data);
    }
    public function selesai($id){
        $kirim="2";
        $this->getDataPengajuan->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        return redirect()->to('/admin/pengajuanPenelitian');
    }

    public function selesaiSuratTugas($id){
        $kirim="2";
        $this->getDataPengajuanSuratTugas->update($id,[
            'status' => $kirim
        ]);
        return redirect()->to('/admin/suratTugas');
    }

    public function selesaiUjiValiditas($id){
        $kirim="2";
        $this->ujiValiditas->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        return redirect()->to('/admin/ujiValiditas');
    }

    public function preview($id){
        $data = [
            'slug'      => "Preview",
            'kategori'  => "Dosen",
        ];
        return view('admin/konten/preview', $data);
    }
    public function edit($id){
        $data = [
            'slug'      => "Preview",
            'kategori'  => "Dosen",
            'data'      => $this->getDataPengajuanSuratTugas->find([$id]),
        ];
        // dd($data);
        return view('admin/konten/dosen_editSuratTugas', $data);
    }

    public function edit_pengajuanPenelitian($id){
        $data = [
            'slug'      => "Pengajuan Penelitian",
            'kategori'  => "Mahasiswa",
            'data'      => $this->getDataPengajuan->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()   
        ];
        // dd($data);
        return view('admin/konten/edit_penelitian', $data);
    }

    // surat tugas HKI
    public function suratTugasHKI(){
        $data = [
            'slug'      => "Surat Tugas HKI",
            'kategori'  => "Dosen",
            'data'      => $this->surat_tugas_hki->belum_tercetak(),
            'tercetak'      => $this->surat_tugas_hki->tercetak(),
        ];
        return view('admin/konten/dosen_suratTugasHKI', $data);
    }
    
    // selesai hki
    public function selesaiHKI($id){
        $kirim="2";
        $this->surat_tugas_hki->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->surat_tugas_hki->find([$id]);
        // dd($nama_pemilik[0]['nama_dosen']);
        return redirect()->to(base_url().'/admin/suratTugasHKI')->with('selesaiHKI', 'Surat Tugas HKI dengan nama dosen <strong>'.$nama_pemilik[0]['nama_dosen'].' </strong>Berhasil Di Selesaikan');
    }

    // lihat surat hki
    public function lihat_suratHKI($id){
        $data =[
            'slug'      => "Surat Tugas HKI",
            'kategori'  => "Dosen",
            'data'      => $this->surat_tugas_hki->find([$id]),
        ];
        return view('admin/konten/lihat_suratHKI', $data);
    }

    // edit surat hki
    public function edit_suratHKI($id){
        $data =[
            'slug'      => "Surat Tugas HKI",
            'kategori'  => "Dosen",
            'data'      => $this->surat_tugas_hki->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        // dd($data);
        return view('admin/konten/edit_suratHKI', $data);
    }

    // surat publikasi
    public function suratPublikasi(){
        $data =[
            'slug'      => "Surat Tugas Publikasi",
            'kategori'  => "Dosen",
            'data'      => $this->surat_tugas_publikasi->belum_tercetak(),
            'tercetak'  => $this->surat_tugas_publikasi->tercetak(),
        ];
        return view('admin/konten/dosen_suratPublikasi', $data);
    }

    // selesai surat publikasi
    public function selesai_suratPublikasi($id){
        $kirim="2";
        $this->surat_tugas_publikasi->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->surat_tugas_publikasi->find([$id]);
        // dd($nama_pemilik[0]['nama_dosen']);
        return redirect()->to(base_url().'/admin/suratPublikasi')->with('selesaiPublikasi', 'Surat Tugas Publikasi dengan nama dosen <strong>'.$nama_pemilik[0]['nama_dosen'].' </strong>Berhasil Di Selesaikan');
    }

    // lihat publikasi
    public function lihat_suratPublikasi($id){
        $data =[
            'slug'      => "Surat Tugas Publikasi",
            'kategori'  => "Dosen",
            'data'      => $this->surat_tugas_publikasi->find([$id]),
        ];
        return view('admin/konten/lihat_suratPublikasi', $data);
    }
    // edit publikasi
    public function edit_suratPublikasi($id){
        $data =[
            'slug'      => "Surat Tugas Publikasi",
            'kategori'  => "Dosen",
            'data'      => $this->surat_tugas_publikasi->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_publikasi', $data);
    }
    
    // surat oral presentasi
    public function oral_presentasi(){
        $data =[
            'slug'      => "Surat Oral Presentasi",
            'kategori'  => "Dosen",
            'data'      => $this->oral_presentasi->belum_tercetak(),
            'tercetak'  => $this->oral_presentasi->tercetak(),
        ];
        return view('admin/konten/dosen_oralPresentasi', $data);
    }

    // selesai surat oral presentasi
    public function selesai_oralPresentasi($id){
        $kirim="2";
        $this->oral_presentasi->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->oral_presentasi->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/oral_presentasi')->with('selesai_oralPresentasi', 'Surat Tugas Oral Presentasi dengan nama dosen <strong>'.$nama_pemilik[0]['nama'].' </strong>Berhasil Di Selesaikan');
    }

    // lihat oral Presentasi
    public function lihat_oralPresentasi($id){
        $data = [
            'slug'      => "Surat Oral Presentasi",
            'kategori'  => "Dosen",
            'data'      => $this->oral_presentasi->find([$id]),
        ];
        return view('admin/konten/lihat_oralPresentasi', $data);
    }

    // edit oral presentasi
    public function edit_oralPresentasi($id){
        $data = [
            'slug'      => "Surat Oral Presentasi",
            'kategori'  => "Dosen",
            'data'      => $this->oral_presentasi->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_oralPresentasi', $data);
    }

    // ethical clearance
    public function ethical(){
        $data = [
            'slug'      => "Surat Ethical Clearance",
            'kategori'  => "Dosen",
            'data'      => $this->izin_ethical_clearance->belum_tercetak(),
            'tercetak'  => $this->izin_ethical_clearance->tercetak(),
        ];
        // dd($data);
        return view('admin/konten/dosen_ethical', $data);
    }
    // lihat oral ethical clearance
    public function lihat_ethical($id){
        $data = [
            'slug'      => "Surat Ethical Clearance",
            'kategori'  => "Dosen",
            'data'      => $this->izin_ethical_clearance->find([$id]),
        ];
        return view('admin/konten/lihat_ethical', $data);
    }

    // edit ethical clearance
    public function edit_ethical($id){
        $data = [
            'slug'      => "Surat Ethical Clearance",
            'kategori'  => "Dosen",
            'data'      => $this->izin_ethical_clearance->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_ethical', $data);
    }

    // selesai surat oral presentasi
    public function selesai_ethical($id){
        $kirim="2";
        $this->izin_ethical_clearance->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->izin_ethical_clearance->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/ethical')->with('selesai_ethical', 'Surat Ethical Clearence dengan nama dosen <strong>'.$nama_pemilik[0]['nama_peneliti'].' </strong>Berhasil Di Selesaikan');
    }

    // izin penelitian
    public function izin_penelitian(){
        $data = [
            'slug'      => "Izin Penelitian",
            'kategori'  => "Dosen",
            'data'      => $this->izin_penelitian->belum_tercetak(),
            'tercetak'  => $this->izin_penelitian->tercetak(),
        ];
        return view('admin/konten/dosen_izinPenelitian', $data);
    }

    //lihat izin penelitian
    public function lihat_izinPenelitian($id){
        $data = [
            'slug'      => "Izin Penelitian",
            'kategori'  => "Dosen",
            'data'      => $this->izin_penelitian->find([$id]),
        ];
        return view('admin/konten/lihat_izinPenelitian', $data);
    }

    // edit izin penelitian
    public function edit_izinPenelitian($id){
        $data = [
            'slug'      => "Izin Penelitian",
            'kategori'  => "Dosen",
            'data'      => $this->izin_penelitian->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_izinPenelitian', $data);
    }

    // selesai izin penelitian
    public function selesai_izinPenelitian($id){
        $kirim="2";
        $this->izin_penelitian->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->izin_penelitian->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/izin_penelitian')->with('selesai_izinPenelitian', 'Surat Izin Penelitian dengan nama dosen <strong>'.$nama_pemilik[0]['nama_dosen'].' </strong>Berhasil Di Selesaikan');
    }

    // izin pengabdian masyarakat 
    public function izin_pengabdianMasyarakat(){
        $data = [
            'slug'      => "Izin Pengabdian Masyarakat",
            'kategori'  => "Dosen",
            'data'      => $this->izin_pengabdian_masyarakat->belum_tercetak(),
            'tercetak'  => $this->izin_pengabdian_masyarakat->tercetak(),
        ];
        return view('admin/konten/dosen_izinPengabdianMasyarakat', $data);
    }
    
    // lihat pengabdian masyarakat
    public function lihat_pengabdianMasyarakat($id){
        $data = [
            'slug'      => "Izin Pengabdian Masyarakat",
            'kategori'  => "Dosen",
            'data'      => $this->izin_pengabdian_masyarakat->find([$id]),
        ];
        return view('admin/konten/lihat_pengabdianMasyarakat', $data);
    }
    // edit pengabdian masyarakat
    public function edit_pengabdianMasyarakat($id){
        $data = [
            'slug'      => "Izin Pengabdian Masyarakat",
            'kategori'  => "Dosen",
            'data'      => $this->izin_pengabdian_masyarakat->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_pengabdianMasyarakat', $data);
    }
    // selesai pengabdian masyarakat 
    public function selesai_pengabdianMasyarakat($id){
        $kirim="2";
        $this->izin_pengabdian_masyarakat->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->izin_pengabdian_masyarakat->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/izin_pengabdianMasyarakat')->with('selesai_pengabdianMasyarakat', 'Surat Izin Penelitian dengan nama dosen <strong>'.$nama_pemilik[0]['nama_dosen'].' </strong>Berhasil Di Selesaikan');
    }

    // selesai determinasi tanaman
    public function selesai_determinasiTanaman($id){
        $kirim="2";
        $this->determinasi_tanaman->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->determinasi_tanaman->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/determinasi_tanaman')->with('selesai_determinasitTanaman', 'Surat Izin Penelitian dengan nama dosen <strong>'.$nama_pemilik[0]['nama_mahasiswa'].' </strong>Berhasil Di Selesaikan');
    }

    // tugas_pengabdian
    public function tugas_pengabdian(){
        $data = [
            'slug'      => "Tugas Pengabdian Masyarakat",
            'kategori'  => "Dosen",
            'data'      => $this->tugas_pengabdian->belum_tercetak(),
            'tercetak'  => $this->tugas_pengabdian->tercetak(),
        ];
        return view('admin/konten/dosen_tugasPengabdian', $data);
    }
    
    // lihat tugas pengabdian
    public function lihat_tugas_pengabdian($id){
        $data = [
            'slug'      => "Tugas Pengabdian Masyarakat",
            'kategori'  => "Dosen",
            'data'      => $this->tugas_pengabdian->find([$id]),
        ];
        return view('admin/konten/lihat_tugasPengabdian', $data);
    }
    // edit tugas pengabdian
    public function edit_tugasPengabdian($id){
        $data = [
            'slug'      => "Tugas Pengabdian Masyarakat",
            'kategori'  => "Dosen",
            'data'      => $this->tugas_pengabdian->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_tugasPengabdian', $data);
    }

    // selesai selesai_tugas_pengabdian
    public function selesai_tugas_pengabdian($id){
        $kirim="2";
        $this->tugas_pengabdian->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->tugas_pengabdian->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/tugas_pengabdian')->with('selesai_tugas_pengabdian', 'Surat Izin Penelitian dengan nama dosen <strong>'.$nama_pemilik[0]['nama_dosen'].' </strong>Berhasil Di Selesaikan');
    }

    // selesai tugas_penelitian
    public function tugas_penelitian(){
        $data = [
            'slug'      => "Tugas Penelitian",
            'kategori'  => "Dosen",
            'data'      => $this->tugas_penelitian->belum_tercetak(),
            'tercetak'  => $this->tugas_penelitian->tercetak(),
        ];
        return view('admin/konten/dosen_tugasPenelitian', $data);
    }

    // lihat tugas_penelitian
    public function lihat_tugasPenelitian($id){
        $id = [
            'slug'      => "Tugas Penelitian",
            'kategori'  => "Dosen",
            'data'      => $this->tugas_penelitian->find([$id])
        ];
        return view('admin/konten/lihat_tugasPenelitian', $id);
    }
    // lihat tugas Penelitian
    public function edit_tugasPenelitian($id){
        $data = [
            'slug'      => "Tugas Penelitian",
            'kategori'  => "Dosen",
            'data'      => $this->tugas_penelitian->find([$id]),
            'nomor_surat' => $this->nomor_surat->nomor_surat()
        ];
        return view('admin/konten/edit_tugasPenelitian', $data);
    }

    // selesai selesai_tugas_penelitian
    public function selesai_tugasPenelitian($id){
        $kirim="2";
        $this->tugas_penelitian->update($id,[
            'status' => $kirim,
            'status_pengajuan' => 'Tercetak'
        ]);
        $nama_pemilik = $this->tugas_penelitian->find([$id]);
        // dd($nama_pemilik[0]['nama']);
        return redirect()->to(base_url().'/admin/tugas_penelitian')->with('selesai_tugas_penelitian', 'Surat Izin Penelitian dengan nama dosen <strong>'.$nama_pemilik[0]['nama_dosen'].' </strong>Berhasil Di Selesaikan');
    }

    // PENYESUAIAN NOMOR
    public function penyesuaian_nomor(){
        $data = [
            'slug'              => "Penyesuaian Nomor Surat",
            'kategori'          => "TOOLS",
            'jumlah_surat'      => $this->nomor_surat->jumlah_surat_yang_telah_terbit(),
            'nomor_surat'       => $this->nomor_surat->nomor_surat(),
        ];
        return view('admin/konten/tools/penyesuaian_nomor', $data);
    }

    // EXPORT LAPORAN SURAT
    public function export_laporan(){
        $data = [
            'slug'             => "Export Laporan Surat",
            'kategori'         => "TOOLS",
            
        ];
        return view('admin/konten/tools/export_laporan',$data);
    }
}
