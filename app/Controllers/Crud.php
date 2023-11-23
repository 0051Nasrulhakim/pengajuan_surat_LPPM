<?php

namespace App\Controllers;
use Pusher\Pusher;


class Crud extends BaseController
{
    public function __construct()
    {

        $this->form_validation              = \Config\Services::validation();
        helper('file_system','form','url','html');
        $this->session = \Config\Services::session();

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
        $this->user                         = new \App\Models\M_User();
        $this->limit_pengajuan              = new \App\Models\M_Limit_Pengajuan();

        // initialisasi pusher
        $this->pusher = new Pusher(
            'b0620d205cd319bb0d47',
            '6b65ea959cf5d23725ee',
            '1369460',
            array(
                'cluster' => 'ap1',
                'useTLS' => true
            )
        );

    }

// MODUL INSERT MAHASISWA
    // INSERT STUDI PENDAHULUAN
    public function insertPendahuluan()
    {   
        $tanggal_pengajuan  = $this->request->getPost('tanggal_surat');
        $hal                = $this->request->getPost('hal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $prodi              = $this->request->getPost('prodi_mhs');
        $fakultas           = $this->request->getPost('fakultas_mhs');
        $universitas        = $this->request->getPost('universitas');
        $tahun_akademik     = $this->request->getPost('tahun_akademik');
        $nama               = $this->request->getPost('nama');
        $nim                = $this->request->getPost('nim');
        $alamat_mhs         = $this->request->getPost('alamat_mhs');
        $dosen_pembimbing   = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian   = $this->request->getPost('judul_penelitian');
        $no_telfon          = $this->request->getPost('nomor_telfon');

        $data = [
            'tanggal_surat'      => $tanggal_pengajuan,
            'hal'                => $hal,
            'ditujukan_kepada'   => $ditujukan_kepada,
            'prodi_mhs'          => $prodi,
            'fakultas_mhs'       => $fakultas,
            'universitas'        => $universitas,
            'tahun_akademik'     => $tahun_akademik,
            'nama'               => $nama,
            'nim'                => $nim,
            'alamat_mhs'         => $alamat_mhs,
            'dosen_pembimbing'   => $dosen_pembimbing,
            'judul_penelitian'   => $judul_penelitian,
            'nomor_telfon'       => $no_telfon
        ];
        
        if($this->form_validation->run($data, 'studiPendahuluan') == FALSE){
            session()->setFlashData('inputs_studiPendahuluan', $this->request->getVar());
			session()->setFlashData('errors_studiPendahuluan', $this->form_validation->getErrors());
			return redirect()->to(base_url('/home/studiPendahuluan'));
        }else{
            $cek = $this->limit_pengajuan->cek_limit($nim);
            
            if($cek[0]['total'] <= "2"){
                $this->studiPendahuluan->insert([
                    'tanggal_surat'      => $tanggal_pengajuan,
                    'hal'                => $hal,
                    'ditujukan_kepada'   => $ditujukan_kepada,
                    'prodi_mhs'          => $prodi,
                    'fakultas_mhs'       => $fakultas,
                    'universitas'        => $universitas,
                    'tahun_akademik'     => $tahun_akademik,
                    'nama'               => $nama,
                    'nim'                => $nim,
                    'alamat_mhs'         => $alamat_mhs,
                    'dosen_pembimbing'   => $dosen_pembimbing,
                    'judul_penelitian'   => $judul_penelitian,
                    'nomor_telfon'       => $no_telfon
                ]);
    
                $pesan = [
                    'judul' => 'STUDI PENDAHULUAN',
                    'isi'   => 'Data Masuk Atas Nama ' . $nama,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
    
                $laporan_terkirim = [
                    'perihal'           => $hal,
                    'nama'              => $nama,
                    'nim'               => $nim,
                    'fakultas'          => $fakultas,
                    'prodi'             => $prodi,
                    'tahun_akademik'    => $tahun_akademik,
                    'judul_penelitian'  => $judul_penelitian,
                    'dosen_pembimbing'  => $dosen_pembimbing,
                    'tanggal_pengajuan' => $tanggal_pengajuan,
                    'kategori'          => 'Mahasiswa',
                    'slug'              => 'Studi Pendahuluan'
                ];

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nim,
                    'nama'              => $nama,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $hal
                ]);

                $this->session->set($laporan_terkirim);
                // dd(session()->get('perihal'));
                session()->setFlashData('success_studiPendahuluan', 'Pengajuan Berhasil Silahkan konfirmasi ke bagian LPPM');
                
                // return redirect()->to(base_url().'/home/studiPendahuluan');
                return redirect()->to(base_url().'/home/selesai');
    
                // return view('publik/laporan_sukses/studi_pendahuluan', $laporan_terkirim);
            }else{
                return redirect()->to(base_url().'/home/studiPendahuluan')->with('Limit_pengajuan', 'Nim dengan nomor ' . $nim . ' telah melebihi batas pengajuan. pengajuan hanya dapat dilakukan maximal 3x silahkan mengajukan lain hari');
            }
            
        }
    }

    // pengajuan penelitian
    public function insertPengajuan_penelitian(){
        $tanggal_masuk    = $this->request->getPost('tanggal_masuk');
        $hal              = $this->request->getPost('hal');
        $ditujukan_kepada = $this->request->getPost('ditujukan_kepada');
        $prodi            = $this->request->getPost('prodi');
        $fakultas         = $this->request->getPost('fakultas');
        $universitas      = $this->request->getPost('universitas');
        $tahun_akademik   = $this->request->getPost('tahun_akademik');
        $nim_mahasiswa    = $this->request->getPost('nim');
        $nama_mahasiswa   = $this->request->getPost('nama');
        $alamat           = $this->request->getPost('alamat');
        $dosen_pembimbing = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian = $this->request->getPost('judul_penelitian');        
        $nomor_telfon     = $this->request->getPost('nomor_telfon');

        $data = [
            'tanggal_masuk'    => $tanggal_masuk,
            'hal'              => $hal,
            'ditujukan_kepada' => $ditujukan_kepada,
            'prodi_mhs'        => $prodi,
            'fakultas_mhs'     => $fakultas,
            'universitas'      => $universitas,
            'tahun_akademik'   => $tahun_akademik,
            'nim_mahasiswa'    => $nim_mahasiswa,
            'nama_mahasiswa'   => $nama_mahasiswa,
            'alamat'           => $alamat,
            'dosen_pembimbing' => $dosen_pembimbing,
            'judul_penelitian' => $judul_penelitian,
            'nomor_telfon'     => $nomor_telfon,
        ];
        
        if($this->form_validation->run($data, 'pengajuanPenelitian') == FALSE){
			session()->setFlashData('inputs', $this->request->getVar());
			session()->setFlashData('errors', $this->form_validation->getErrors());
			return redirect()->to(base_url('/home/pengajuan'));
		}else{
            $cek = $this->limit_pengajuan->cek_limit($nim_mahasiswa);
            
            if($cek[0]['total'] <= "2"){
                $this->pengajuanPenelitian->insert([
                    'tanggal_masuk'    => $tanggal_masuk,
                    'hal'              => $hal,
                    'ditujukan_kepada' => $ditujukan_kepada,
                    'prodi_mhs'        => $prodi,
                    'fakultas_mhs'     => $fakultas,
                    'universitas'      => $universitas,
                    'tahun_akademik'   => $tahun_akademik,
                    'nim_mahasiswa'    => $nim_mahasiswa,
                    'nama_mahasiswa'   => $nama_mahasiswa,
                    'alamat'           => $alamat,
                    'dosen_pembimbing' => $dosen_pembimbing,
                    'judul_penelitian' => $judul_penelitian,
                    'nomor_telfon'     => $nomor_telfon,
                ]);

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nim_mahasiswa,
                    'nama'              => $nama_mahasiswa,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $hal
                ]);
    
                $pesan = [
                    'judul' => 'PENGAJUAN PENELITIAN',
                    'isi'   => 'Data Masuk Atas Nama ' . $nama_mahasiswa,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
    
                $laporan_terkirim = [
                    'perihal'           => $hal,
                    'nama'              => $nama_mahasiswa,
                    'nim'               => $nim_mahasiswa,
                    'fakultas'          => $fakultas,
                    'prodi'             => $prodi,
                    'tahun_akademik'    => $tahun_akademik,
                    'judul_penelitian'  => $judul_penelitian,
                    'dosen_pembimbing'  => $dosen_pembimbing,
                    'tanggal_pengajuan' => $tanggal_masuk,
                    'kategori'          => 'Mahasiswa',
                    'slug'              => 'Pengajuan Penelian'
                ];
                
                $this->session->set($laporan_terkirim);
    
                session()->setFlashData('success', 'Pengajuan Berhasil Silahkan konfirmasi ke bagian LPPM');
                // return redirect()->to(base_url().'/home/pengajuan');
                return redirect()->to(base_url().'/home/selesai_penelitian');
            }else{
                return redirect()->to(base_url().'/home/determinasi_tanaman')->with('Limit_pengajuan', 'Nim dengan nomor ' . $nim_mahasiswa . ' telah melebihi batas pengajuan. pengajuan hanya dapat dilakukan maximal 3x silahkan mengajukan lain hari');
            }
        }  
    }

    // UJI VALIDITAS
    public function insert_ujiValiditas(){
        $tanggal_pengajuan  = $this->request->getPost('tanggal_surat');
        $hal                = $this->request->getPost('hal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $prodi              = $this->request->getPost('prodi_mhs');
        $fakultas           = $this->request->getPost('fakultas_mhs');
        $universitas        = $this->request->getPost('universitas');
        $tahun_akademik     = $this->request->getPost('tahun_akademik');
        $nama               = $this->request->getPost('nama');
        $nim                = $this->request->getPost('nim');
        $alamat_mhs         = $this->request->getPost('alamat_mhs');
        $dosen_pembimbing   = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian   = $this->request->getPost('judul_penelitian');
        $no_telfon          = $this->request->getPost('nomor_telfon');

        $data = [
            'tanggal_surat'      => $tanggal_pengajuan,
            'hal'                => $hal,
            'ditujukan_kepada'   => $ditujukan_kepada,
            'prodi_mhs'          => $prodi,
            'fakultas_mhs'       => $fakultas,
            'universitas'        => $universitas,
            'tahun_akademik'     => $tahun_akademik,
            'nama'               => $nama,
            'nim'                => $nim,
            'alamat_mhs'         => $alamat_mhs,
            'dosen_pembimbing'   => $dosen_pembimbing,
            'judul_penelitian'   => $judul_penelitian,
            'nomor_telfon'          => $no_telfon
        ];

        if($this->form_validation->run($data, 'studiPendahuluan') == FALSE){
			session()->setFlashData('inputs_ujiValiditas', $this->request->getVar());
			session()->setFlashData('errors_ujiValiditas', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/ujiValiditas');
		}else{
            $cek = $this->limit_pengajuan->cek_limit($nim);
            if($cek[0]['total'] <= "2"){
                $this->ujiValiditas->insert([
                    'tanggal_surat'      => $tanggal_pengajuan,
                    'hal'                => $hal,
                    'ditujukan_kepada'   => $ditujukan_kepada,
                    'prodi_mhs'          => $prodi,
                    'fakultas_mhs'       => $fakultas,
                    'universitas'        => $universitas,
                    'tahun_akademik'     => $tahun_akademik,
                    'nama'               => $nama,
                    'nim'                => $nim,
                    'alamat_mhs'         => $alamat_mhs,
                    'dosen_pembimbing'   => $dosen_pembimbing,
                    'judul_penelitian'   => $judul_penelitian,
                    'nomor_telfon'       => $no_telfon
                ]);
    
                $pesan = [
                    'judul'     => 'UJI VALIDITAS',
                    'isi'       => 'Data Masuk Atas Nama ' . $nama,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
    
                $laporan_terkirim = [
                    'perihal'           => $hal,
                    'nama'              => $nama,
                    'nim'               => $nim,
                    'fakultas'          => $fakultas,
                    'prodi'             => $prodi,
                    'tahun_akademik'    => $tahun_akademik,
                    'judul_penelitian'  => $judul_penelitian,
                    'dosen_pembimbing'  => $dosen_pembimbing,
                    'tanggal_pengajuan' => $tanggal_pengajuan,
                    'kategori'          => 'Mahasiswa',
                    'slug'              => 'Uji Validitas'
                ];
                
                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nama,
                    'nama'              => $nama,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $hal,
                ]);

                $this->session->set($laporan_terkirim);
    
                session()->setFlashData('success_ujiValiditas', 'Pengajuan Berhasil Silahkan konfirmasi ke bagian LPPM');
                // return redirect()->to(base_url().'/home/ujiValiditas');
                return redirect()->to(base_url().'/home/selesai_validitas');
            }else{
                return redirect()->to(base_url().'/home/ujiValiditas')->with('Limit_pengajuan', 'Nim dengan nomor ' . $nim . ' telah melebihi batas pengajuan. pengajuan hanya dapat dilakukan maximal 3x silahkan mengajukan lain hari');
            }
        }
    }

    // determinasi tanaman
    public function determinasi_tanaman(){
        $tanggal          = $this->request->getPost('tanggal_masuk');
        $perihal          = $this->request->getPost('hal');
        $lampiran         = $this->request->getPost('lampiran');
        $universitas      = $this->request->getPost('universitas');
        $ditujukan_kepada = $this->request->getPost('ditujukan_kepada');
        $nama             = $this->request->getPost('nama_mahasiswa');  
        $nim              = $this->request->getPost('nim_mahasiswa');
        $fakultas         = $this->request->getPost('fakultas_mhs');
        $prodi            = $this->request->getPost('prodi_mhs');
        $tahun_akademik   = $this->request->getPost('tahun_akademik');
        $alamat           = $this->request->getPost('alamat');
        $dosen_pembimbing = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian = $this->request->getPost('judul_penelitian');
        $nomor_telfon     = $this->request->getPost('nomor_telfon');

        $data = [
            'tanggal_masuk'     => $tanggal,
            'hal'               => $perihal,
            'lampiran'          => $lampiran,
            'universitas'       => $universitas,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'nama_mahasiswa'    => $nama,
            'nim_mahasiswa'     => $nim,
            'fakultas_mhs'      => $fakultas,
            'prodi_mhs'         => $prodi,
            'tahun_akademik'    => $tahun_akademik,
            'alamat'            => $alamat,
            'dosen_pembimbing'  => $dosen_pembimbing,
            'judul_penelitian'  => $judul_penelitian,
            'nomor_telfon'      => $nomor_telfon
            
        ];

        if($this->form_validation->run($data, 'determinasi_tanaman') == FALSE){
			session()->setFlashData('error_determinasiTanaman', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/determinasi_tanaman');
        }else{
            $cek = $this->limit_pengajuan->cek_limit($nim);
            if($cek[0]['total'] <= "2"){
                
                $this->determinasi_tanaman->insert($data);

                $pesan = [
                    'judul'     => 'DETERMINASI TANAMAN',
                    'isi'       => 'Data Masuk Atas Nama ' . $nama,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
                
                $laporan_terkirim = [
                    'perihal'           => $perihal,
                    'nama'              => $nama,
                    'nim'               => $nim,
                    'fakultas'          => $fakultas,
                    'prodi'             => $prodi,
                    'tahun_akademik'    => $tahun_akademik,
                    'judul_penelitian'  => $judul_penelitian,
                    'dosen_pembimbing'  => $dosen_pembimbing,
                    'tanggal_pengajuan' => $tanggal,
                    'kategori'          => 'Mahasiswa',
                    'slug'              => 'Uji Validitas'
                ];
                
                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nama,
                    'nama'              => $nama,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $perihal,
                ]);

                $this->session->set($laporan_terkirim);

                // return redirect()->to(base_url().'/home/determinasi_tanaman')->with('success_determinasiTanaman','Pengajuan Berhasil Silahkan konfirmasi ke bagian LPPM');
                return redirect()->to(base_url().'/home/selesai_determinasi');
            }else{
                return redirect()->to(base_url().'/home/determinasi_tanaman')->with('Limit_pengajuan', 'Nim dengan nomor ' . $nim . ' telah melebihi batas pengajuan. pengajuan hanya dapat dilakukan maximal 3x silahkan mengajukan lain hari');
            }
        }
    }
// END INSERT MODUL MAHASISWA

/*

-
-

*/

// MODUL UPDATE MAHASISWA
    // UPDATE STUDI PENDAHULUAN
    public function update_studiPendahuluan(){
        $id                 = $this->request->getPost('id');
        $lampiran           = $this->request->getPost('lampiran');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_pengajuan  = $this->request->getPost('tanggal_surat');
        $hal                = $this->request->getPost('hal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $prodi              = $this->request->getPost('prodi_mhs');
        $fakultas           = $this->request->getPost('fakultas_mhs');
        $universitas        = $this->request->getPost('universitas');
        $tahun_akademik     = $this->request->getPost('tahun_akademik');
        $nama               = $this->request->getPost('nama');
        $nim                = $this->request->getPost('nim');
        $alamat_mhs         = $this->request->getPost('alamat_mhs');
        $dosen_pembimbing   = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian   = $this->request->getPost('judul_penelitian');
        $no_telfon          = $this->request->getPost('nomor_telfon');
        $nama_yang_bertanda_tangan = $this->request->getPost('nama_yang_bertanda_tangan');
        $nik_yang_bertanda_tangan  = $this->request->getPost('nik_yang_bertanda_tangan');

        $data = [
            'nomor_surat'        => $nomor_surat,
            'lampiran'           => $lampiran,
            'tanggal_surat'     => $tanggal_pengajuan,
            'hal'                => $hal,
            'ditujukan_kepada'   => $ditujukan_kepada,
            'prodi_mhs'          => $prodi,
            'fakultas_mhs'       => $fakultas,
            'universitas'        => $universitas,
            'tahun_akademik'     => $tahun_akademik,
            'nama'               => $nama,
            'nim'                => $nim,
            'alamat_mhs'         => $alamat_mhs,
            'dosen_pembimbing'   => $dosen_pembimbing,
            'judul_penelitian'   => $judul_penelitian,
            'nomor_telfon'       => $no_telfon,
            'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
            'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
        ];
        // dd($data);
        if($this->form_validation->run($data, 'studiPendahuluan') == FALSE){
            session()->setFlashData('inputs_studiPendahuluan', $this->request->getVar());
			session()->setFlashData('errors_studiPendahuluan', $this->form_validation->getErrors());
			return redirect()->to(base_url('/admin/edit_studiPendahuluan/'.$id));
        }else{
            $this->studiPendahuluan->update($id, [
                'nomor_surat'        => $nomor_surat,
                'lampiran'           => $lampiran,
                'tanggal_surat'      => $tanggal_pengajuan,
                'hal'                => $hal,
                'ditujukan_kepada'   => $ditujukan_kepada,
                'prodi_mhs'          => $prodi,
                'fakultas_mhs'       => $fakultas,
                'universitas'        => $universitas,
                'tahun_akademik'     => $tahun_akademik,
                'nama'               => $nama,
                'nim'                => $nim,
                'alamat_mhs'         => $alamat_mhs,
                'dosen_pembimbing'   => $dosen_pembimbing,
                'judul_penelitian'   => $judul_penelitian,
                'nomor_telfon'       => $no_telfon,
                'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
                'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
            ]);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama,
                    'tahun'                 => date('Y'),
                    'hal'                   => $hal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama,
                    'tahun'                 => date('Y'),
                    'hal'               => $hal,
                    'ditujukan_kepada'  => $ditujukan_kepada,
                ]);
            }
            session()->setFlashData('success_studiPendahuluan', 'Berhasil Di update');
            return redirect()->to(base_url('/admin/lihat_studiPendahuluan/'.$id));
        }
    }

    // UPDATE PENGAJUAN PENELITIAN
    public function updatePengajuan_penelitian(){
        $id               = $this->request->getPost('id');
        $lampiran         = $this->request->getPost('lampiran');
        $nomor_surat      = $this->request->getPost('nomor_surat');
        $tanggal_masuk    = $this->request->getPost('tanggal_masuk');
        $hal              = $this->request->getPost('hal');
        $ditujukan_kepada = $this->request->getPost('ditujukan_kepada');
        $prodi            = $this->request->getPost('prodi');
        $fakultas         = $this->request->getPost('fakultas');
        $universitas      = $this->request->getPost('universitas');
        $tahun_akademik   = $this->request->getPost('tahun_akademik');
        $nim_mahasiswa    = $this->request->getPost('nim');
        $nama_mahasiswa   = $this->request->getPost('nama');
        $alamat           = $this->request->getPost('alamat');
        $dosen_pembimbing = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian = $this->request->getPost('judul_penelitian'); 
        $nama_yang_bertanda_tangan = $this->request->getPost('nama_yang_bertanda_tangan'); 
        $nik_yang_bertanda_tangan  = $this->request->getPost('nik_yang_bertanda_tangan'); 

        $data = [
            'nomor_surat'      => $nomor_surat,
            'tanggal_masuk'    => $tanggal_masuk,
            'hal'              => $hal,
            'ditujukan_kepada' => $ditujukan_kepada,
            'prodi_mhs'        => $prodi,
            'fakultas_mhs'     => $fakultas,
            'universitas'      => $universitas,
            'tahun_akademik'   => $tahun_akademik,
            'nim_mahasiswa'    => $nim_mahasiswa,
            'nama_mahasiswa'   => $nama_mahasiswa,
            'alamat'           => $alamat,
            'dosen_pembimbing' => $dosen_pembimbing,
            'judul_penelitian' => $judul_penelitian,
            'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
            'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
        ];
        
        if($this->form_validation->run($data, 'pengajuanPenelitian') == FALSE){
			session()->setFlashData('inputs_edit_penelitian', $this->request->getVar());
			session()->setFlashData('errors_edit_penelitian', $this->form_validation->getErrors());
			return redirect()->to(base_url('/admin/edit_pengajuanPenelitian/'.$id));
		}else{
            $this->pengajuanPenelitian->update($id, [
                'lampiran'         => $lampiran,
                'nomor_surat'      => $nomor_surat,
                'tanggal_masuk'    => $tanggal_masuk,
                'hal'              => $hal,
                'ditujukan_kepada' => $ditujukan_kepada,
                'prodi_mhs'        => $prodi,
                'fakultas_mhs'     => $fakultas,
                'universitas'      => $universitas,
                'tahun_akademik'   => $tahun_akademik,
                'nim_mahasiswa'    => $nim_mahasiswa,
                'nama_mahasiswa'   => $nama_mahasiswa,
                'alamat'           => $alamat,
                'dosen_pembimbing' => $dosen_pembimbing,
                'judul_penelitian' => $judul_penelitian,
                'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
                'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan

            ]);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_mahasiswa,
                    'tahun'                 => date('Y'),
                    'hal'               => $hal,
                    'ditujukan_kepada'  => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_mahasiswa,
                    'tahun'                 => date('Y'),
                    'hal'               => $hal,
                    'ditujukan_kepada'  => $ditujukan_kepada,
                ]);
            }
            session()->setFlashData('success_edit_penelitian', ' Berhasil melakukan edit data');
            return redirect()->to(base_url('/admin/lihatPengajuanPenelitian/'.$id));
        }  
    }

    // UPDATE UJI VALIDITAS
    public function update_ujiValiditas(){
        $id                 = $this->request->getPost('id');
        $lampiran           = $this->request->getPost('lampiran');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_pengajuan  = $this->request->getPost('tanggal_surat');
        $hal                = $this->request->getPost('hal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $prodi              = $this->request->getPost('prodi_mhs');
        $fakultas           = $this->request->getPost('fakultas_mhs');
        $universitas        = $this->request->getPost('universitas');
        $tahun_akademik     = $this->request->getPost('tahun_akademik');
        $nama               = $this->request->getPost('nama');
        $nim                = $this->request->getPost('nim');
        $alamat_mhs         = $this->request->getPost('alamat_mhs');
        $dosen_pembimbing   = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian   = $this->request->getPost('judul_penelitian');
        $no_telfon          = $this->request->getPost('nomor_telfon');
        $nama_yang_bertanda_tangan  = $this->request->getPost('nama_yang_bertanda_tangan');
        $nik_yang_bertanda_tangan   = $this->request->getPost('nik_yang_bertanda_tangan');

        $data = [
            'nomor_surat'        => $nomor_surat,
            'lampiran'           => $lampiran,
            'tanggal_surat'      => $tanggal_pengajuan,
            'hal'                => $hal,
            'ditujukan_kepada'   => $ditujukan_kepada,
            'prodi_mhs'          => $prodi,
            'fakultas_mhs'       => $fakultas,
            'universitas'        => $universitas,
            'tahun_akademik'     => $tahun_akademik,
            'nama'               => $nama,
            'nim'                => $nim,
            'alamat_mhs'         => $alamat_mhs,
            'dosen_pembimbing'   => $dosen_pembimbing,
            'judul_penelitian'   => $judul_penelitian,
            'nomor_telfon'       => $no_telfon,
            'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
            'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
        ];

        if($this->form_validation->run($data, 'studiPendahuluan') == FALSE){
            session()->setFlashData('inputs_studiPendahuluan', $this->request->getVar());
			session()->setFlashData('errors_studiPendahuluan', $this->form_validation->getErrors());
			return redirect()->to(base_url('/admin/edit_studiPendahuluan/'.$id));
        }else{
            $this->ujiValiditas->update($id, [
                'nomor_surat'        => $nomor_surat,
                'lampiran'           => $lampiran,
                'tanggal_surat'      => $tanggal_pengajuan,
                'hal'                => $hal,
                'ditujukan_kepada'   => $ditujukan_kepada,
                'prodi_mhs'          => $prodi,
                'fakultas_mhs'       => $fakultas,
                'universitas'        => $universitas,
                'tahun_akademik'     => $tahun_akademik,
                'nama'               => $nama,
                'nim'                => $nim,
                'alamat_mhs'         => $alamat_mhs,
                'dosen_pembimbing'   => $dosen_pembimbing,
                'judul_penelitian'   => $judul_penelitian,
                'nomor_telfon'       => $no_telfon,
                'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
                'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
            ]);
            
            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama,
                    'tahun'                 => date('Y'),
                    'hal'               => $hal,
                    'ditujukan_kepada'  => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama,
                    'tahun'                 => date('Y'),
                    'hal'               => $hal,
                    'ditujukan_kepada'  => $ditujukan_kepada,
                ]);
            }
            session()->setFlashData('success_ujiValiditas', 'Berhasil Di update');
            return redirect()->to(base_url('/admin/lihat_ujiValiditas/'.$id));
        }
    }

    // UPDATE DETERMINASI TANAMAN
    public function update_determinasiTanaman(){
        $id               = $this->request->getPost('id');
        $nomor_surat      = $this->request->getPost('nomor_surat');       
        $tanggal          = $this->request->getPost('tanggal_masuk');
        $perihal          = $this->request->getPost('hal');
        $lampiran         = $this->request->getPost('lampiran');
        $universitas      = $this->request->getPost('universitas');
        $ditujukan_kepada = $this->request->getPost('ditujukan_kepada');
        $nama             = $this->request->getPost('nama_mahasiswa');  
        $nim              = $this->request->getPost('nim_mahasiswa');
        $fakultas         = $this->request->getPost('fakultas_mhs');
        $prodi            = $this->request->getPost('prodi_mhs');
        $tahun_akademik   = $this->request->getPost('tahun_akademik');
        $alamat           = $this->request->getPost('alamat');
        $dosen_pembimbing = $this->request->getPost('dosen_pembimbing');
        $judul_penelitian = $this->request->getPost('judul_penelitian');
        $nomor_telfon     = $this->request->getPost('nomor_telfon');

        $data = [
            'nomor_surat'       => $nomor_surat,
            'tanggal_masuk'     => $tanggal,
            'hal'               => $perihal,
            'lampiran'          => $lampiran,
            'universitas'       => $universitas,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'nama_mahasiswa'    => $nama,
            'nim_mahasiswa'     => $nim,
            'fakultas_mhs'      => $fakultas,
            'prodi_mhs'         => $prodi,
            'tahun_akademik'    => $tahun_akademik,
            'alamat'            => $alamat,
            'dosen_pembimbing'  => $dosen_pembimbing,
            'judul_penelitian'  => $judul_penelitian,
            'nomor_telfon'      => $nomor_telfon
        ];
        
        if($this->form_validation->run($data, 'determinasi_tanaman') == FALSE){
			session()->setFlashData('error_determinasiTanaman', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/determinasi_tanaman');
        }else{
            $this->determinasi_tanaman->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_determinasiTanaman/'.$id)->with('update_determinasiTanaman','update data determinasi tanaman dengan nama ' . $nama . ' berhasil');
        }
    }

// END MODUL UPDATE MAHASISWA

/*

-
-

*/

// MODUL INSERT DOSEN
    // INSERT SURAT TUGAS HKI
    public function insert_surat_tugas_hki(){
        $tanggal_pengajuan  = $this->request->getPost('tanggal_surat');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $pangkat            = $this->request->getPost('pangkat');
        $universitas        = $this->request->getPost('universitas');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $jenis_ciptaan      = $this->request->getPost('jenis_ciptaan');
        $judul              = $this->request->getPost('judul');
        $nomor_permohonan   = $this->request->getPost('nomor_permohonan');
        $tanggal_permohonan = $this->request->getPost('tanggal_permohonan');
        $nomor_pencatatan   = $this->request->getPost('nomor_pencatatan');
        $tahun_terbit       = $this->request->getPost('tahun_terbit');
        $dikategorikan      = $this->request->getPost('dikategorikan');
        $bentuk_tugas       = $this->request->getPost('bentuk_tugas');

        $data = [
            'tanggal_masuk'     => $tanggal_pengajuan,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'pangkat'           => $pangkat,
            'universitas'       => $universitas,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'jenis_ciptaan'     => $jenis_ciptaan,
            'judul'             => $judul,
            'nomor_permohonan'  => $nomor_permohonan,
            'tanggal_permohonan'=> $tanggal_permohonan,
            'nomor_pencatatan'  => $nomor_pencatatan,
            'tahun_terbit'      => $tahun_terbit,
            'dikategorikan'     => $dikategorikan,
            'bentuk_tugas'      => $bentuk_tugas,
        ];
        
        if($this->form_validation->run($data, 'surat_tugas_hki') == FALSE){
			session()->setFlashData('error_surat_tugas_hki', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/surat_tugas_hki');
        }else{

            $cek = $this->limit_pengajuan->cek_limit($nidn);
            
            if($cek[0]['total'] <= "2"){
                $this->surat_tugas_hki->insert($data); 

                $pesan = [
                    'judul' => 'SURAT TUGAS HKI',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
                
                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nidn,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $bentuk_tugas,
                ]);                

                return redirect()->to(base_url().'/home/surat_tugas_hki')->with('sukses_surat_tugas_hki', 'Berhasil Di Input Silahkan Konfirmasi ke-pihak terkait.');
            }else{
                return redirect()->to(base_url().'/home/surat_tugas_hki')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // INSERT SURAT TUGAS PUBLIKASI
    public function insert_surat_tugas_publikasi(){
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $universitas        = $this->request->getPost('universitas');
        $bentuk_tugas       = $this->request->getPost('bentuk_tugas');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $pangkat            = $this->request->getPost('pangkat');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $judul              = $this->request->getPost('judul');
        $nama_jurnal        = $this->request->getPost('nama_jurnal');
        $nomor_dan_volume   = $this->request->getPost('nomor_dan_volume');
        $issn               = $this->request->getPost('issn');
        $penerbit           = $this->request->getPost('penerbit');
        $kategori_jurnal    = $this->request->getPost('kategori_jurnal');
        $tanggal_terbit     = $this->request->getPost('tanggal_terbit');
        $dikategorikan      = $this->request->getPost('dikategorikan');
    
        $data = [
            'tanggal_masuk'     => $tanggal_masuk,
            'universitas'       => $universitas,
            'bentuk_tugas'      => $bentuk_tugas,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'pangkat'           => $pangkat,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'judul'             => $judul,
            'nama_jurnal'       => $nama_jurnal,
            'nomor_dan_volume'  => $nomor_dan_volume,
            'issn'              => $issn,
            'penerbit'          => $penerbit,
            'kategori_jurnal'   => $kategori_jurnal,
            'tanggal_terbit'    => $tanggal_terbit,
            'dikategorikan'     => $dikategorikan
        ];
        
        if($this->form_validation->run($data, 'tugas_publikasi') == FALSE){
			session()->setFlashData('error_surat_tugas_publikasi', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/surat_tugas_publikasi');
        }else{
            $cek = $this->limit_pengajuan->cek_limit($nidn);
            
            if($cek[0]['total'] <= "2"){
                $this->surat_tugas_publikasi->insert($data);

                $pesan = [
                    'judul' => 'SURAT TUGAS PUBLIKASI',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan); 

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nidn,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $bentuk_tugas,
                ]); 
                
                return redirect()->to(base_url().'/home/surat_tugas_publikasi')->with('sukses_surat_tugas_publikasi', 'Berhasil Di Input Silahkan Konfirmasi ke-pihak terkait.');
            }else{
                return redirect()->to(base_url().'/home/surat_tugas_publikasi')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // INSERT ORAL PRESENTASI
    public function insert_oral_presentasi(){
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $pangkat            = $this->request->getPost('pangkat');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $universitas        = $this->request->getPost('universitas');
        $bentuk_kegiatan    = $this->request->getPost('bentuk_kegiatan');
        $nama_kegiatan      = $this->request->getPost('nama_kegiatan');
        $judul              = $this->request->getPost('judul');
        $tanggal            = $this->request->getPost('tanggal');
        $dikategorikan      = $this->request->getPost('dikategorikan');
        
        $data = [
            'tanggal_masuk'     => $tanggal_masuk,
            'nama'              => $nama_dosen,
            'nidn'              => $nidn,
            'pangkat'           => $pangkat,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'universitas'       => $universitas,
            'bentuk_kegiatan'   => $bentuk_kegiatan,
            'nama_kegiatan'     => $nama_kegiatan,
            'judul'             => $judul,
            'tanggal'           => $tanggal,
            'dikategorikan'     => $dikategorikan
        ];
        
        if($this->form_validation->run($data, 'oral_presentasi') == FALSE){
			session()->setFlashData('error_surat_oral_presentasi', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/surat_tugas_oral_presentasi');
        }else{
            $cek = $this->limit_pengajuan->cek_limit($nidn);
            
            if($cek[0]['total'] <= "2"){
                $this->oral_presentasi->insert($data);

                $pesan = [
                    'judul' => 'ORAL PRESENTASI',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nidn,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $bentuk_kegiatan,
                ]);

                return redirect()->to(base_url().'/home/surat_tugas_oral_presentasi')->with('sukses_surat_oral_presentasi','Berhasil Di Input Silahkan Konfirmasi ke-pihak terkait.');
            }else{
                return redirect()->to(base_url().'/home/surat_tugas_oral_presentasi')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // INSERT ETCHICAL CLEARANCE
    public function insert_izin_ethical_clearance(){
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $lampiran           = $this->request->getPost('lampiran');
        $perihal            = $this->request->getPost('perihal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $fakultas           = $this->request->getPost('fakultas');
        $universitas        = $this->request->getPost('universitas');
        $prodi              = $this->request->getPost('prodi');
        $nama_peneliti      = $this->request->getPost('nama_peneliti');
        $nidn               = $this->request->getPost('nidn');
        $judul_penelitian   = $this->request->getPost('judul_penelitian');

        $data = [
            'tanggal_masuk'     => $tanggal_masuk,
            'lampiran'          => $lampiran,
            'perihal'           => $perihal,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'fakultas'          => $fakultas,
            'universitas'       => $universitas,
            'prodi'             => $prodi,
            'nama_peneliti'     => $nama_peneliti,
            'nidn'              => $nidn,
            'judul_penelitian'  => $judul_penelitian
        ];
        
        if($this->form_validation->run($data, 'izin_ethical_clearance') == FALSE){
			session()->setFlashData('error_izin_ethical_clearance', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/izin_ethical_clearance');
        }else{
            $cek = $this->limit_pengajuan->cek_limit($nidn);
            
            if($cek[0]['total'] <= "2"){
                $this->izin_ethical_clearance->insert($data);

                $pesan = [
                    'judul' => 'ETHICAL CLEARENCE',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_peneliti,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
                
                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nidn,
                    'nama'              => $nama_peneliti,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $perihal,
                ]);

                return redirect()->to(base_url().'/home/izin_ethical_clearance')->with('sukses_izin_ethical_clearance','Berhasil Di Input Silahkan Konfirmasi ke-pihak terkait.');
            }else{
                return redirect()->to(base_url().'/home/izin_ethical_clearance')->with('Limit_pengajuan', 'Maaf, '.$nama_peneliti.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // insert surat izin penelitian
    public function surat_izin_penelitian(){
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $lampiran           = $this->request->getPost('lampiran');
        $perihal            = $this->request->getPost('perihal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $fakultas           = $this->request->getPost('fakultas');
        $universitas        = $this->request->getPost('universitas');
        $prodi              = $this->request->getPost('prodi');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $nama_mahasiswa     = $this->request->getPost('nama_mahasiswa');
        $nim                = $this->request->getPost('nim');
        $judul_penelitian   = $this->request->getPost('judul_penelitian'); 
        
        $data = [
            'tanggal_masuk'     => $tanggal_masuk,
            'lampiran'          => $lampiran,
            'perihal'           => $perihal,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'fakultas'          => $fakultas,
            'universitas'       => $universitas,
            'prodi'             => $prodi,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'nama_mahasiswa'    => $nama_mahasiswa,
            'nim'               => $nim,
            'judul_penelitian'  => $judul_penelitian
        ];
        
        if($this->form_validation->run($data, 'izin_penelitian') == FALSE){
			session()->setFlashData('errror_izin_penelitian', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/surat_izin_penelitian');
        }else{
            $cek = $this->limit_pengajuan->cek_limit($nidn);

            if($cek[0]['total'] <= "2"){
                $this->izin_penelitian->insert($data);

                $pesan = [
                    'judul' => 'IZIN PENELITIAN',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nidn,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $perihal,
                ]);

                return redirect()->to(base_url().'/home/surat_izin_penelitian')->with('sukses_izin_penelitian','Berhasil Di Input Silahkan Konfirmasi ke-pihak terkait.');
            }else{
                return redirect()->to(base_url().'/home/surat_izin_penelitian')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // izin pengabdian masyarakat 
    public function pengabdian_masyarakat(){
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $lampiran           = $this->request->getPost('lampiran');
        $perihal            = $this->request->getPost('perihal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $universitas        = $this->request->getPost('universitas');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $nama_mahasiswa     = $this->request->getPost('nama_mahasiswa');
        $nim                = $this->request->getPost('nim');
        $judul_pengabdian   = $this->request->getPost('judul_pengabdian');

        $data = [
            'tanggal_masuk'     => $tanggal_masuk,
            'lampiran'          => $lampiran,
            'perihal'           => $perihal,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'universitas'       => $universitas,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'nama_mahasiswa'    => $nama_mahasiswa,
            'nim'               => $nim,
            'judul_pengabdian'  => $judul_pengabdian,
        ];
        
        if($this->form_validation->run($data, 'pengabdian_masyarakat') == FALSE){
			session()->setFlashData('error_pengabdian_masyarakat', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/pengabdian_masyarakat');
        }else{

            $cek = $this->limit_pengajuan->cek_limit($nidn);

            if($cek[0]['total'] <= "2"){
                $this->izin_pengabdian_masyarakat->insert($data);

                $pesan = [
                    'judul' => 'IZIN PENGABDIAN MASYARAKAT',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nidn,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $perihal,
                ]);

                return redirect()->to(base_url().'/home/pengabdian_masyarakat')->with('sukses_pengabdian_masyarakat','Berhasil Di Input Silahkan Konfirmasi ke-pihak terkait.');
            }else{
                return redirect()->to(base_url().'/home/pengabdian_masyarakat')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // insert tugas pengabdian
    public function insert_tugasPengabdian(){
        $tanggal_masuk          = $this->request->getPost('tanggal_masuk');
        $nama_yang_bertanda     = $this->request->getPost('nama_yang_bertanda_tangan');
        $jabatan_yang_bertanda  = $this->request->getPost('jabatan_yang_bertanda_tangan');
        $alamat                 = $this->request->getPost('alamat');
        $nama_dosen             = $this->request->getPost('nama_dosen');
        $jabatan                = $this->request->getPost('jabatan');
        $nama_mahasiswa         = $this->request->getPost('nama_mahasiswa');
        $keperluan              = $this->request->getPost('keperluan');
        $tanggal                = $this->request->getPost('tanggal');
        $tujuan                 = $this->request->getPost('tujuan');

        $data = [
            'tanggal_masuk'                 => $tanggal_masuk,
            'nama_yang_bertanda_tangan'     => $nama_yang_bertanda,
            'jabatan_yang_bertanda_tangan'  => $jabatan_yang_bertanda,
            'alamat'                        => $alamat,
            'nama_dosen'                    => $nama_dosen,
            'jabatan'                       => $jabatan,
            'nama_mahasiswa'                => $nama_mahasiswa,
            'keperluan'                     => $keperluan,
            'tanggal'                       => $tanggal,
            'tujuan'                        => $tujuan
        ];
        
        if($this->form_validation->run($data, 'tugasPengabdian') == FALSE){
			session()->setFlashData('error_tugas_pengabdian', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/tugas_pengabdian');
        }else{
            $cek = $this->limit_pengajuan->cek_limit_tugas_pengabdian($nama_dosen);

            if($cek[0]['total'] <= "2"){
                $this->tugas_pengabdian->insert($data);

                $pesan = [
                    'judul' => 'TUGAS PENGABDIAN MASYARAKAT',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);

                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nama_dosen,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $keperluan,
                ]);

                return redirect()->to(base_url().'/home/tugas_pengabdian')->with('sukses_tugas_pengabdian','pengajuan surat berhasil silahkan konfirmasi ke pihak terkait');
            }else{
                return redirect()->to(base_url().'/home/tugas_pengabdian')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

    // insert tugas penelitian
    public function insert_tugasPenelitian(){
        $tanggal_masuk          = $this->request->getPost('tanggal_masuk');
        $nama_yang_bertanda     = $this->request->getPost('nama_yang_bertanda_tangan');
        $jabatan_yang_bertanda  = $this->request->getPost('jabatan_yang_bertanda_tangan');
        $alamat                 = $this->request->getPost('alamat');
        $nama_dosen             = $this->request->getPost('nama_dosen');
        $jabatan                = $this->request->getPost('jabatan');
        $nama_mahasiswa         = $this->request->getPost('nama_mahasiswa');
        $keperluan              = $this->request->getPost('keperluan');
        $judul_penelitian       = $this->request->getPost('judul_penelitian');
        $tanggal                = $this->request->getPost('tanggal');
        $tujuan                 = $this->request->getPost('tujuan');

        $data = [
            'tanggal_masuk'                 => $tanggal_masuk,
            'nama_yang_bertanda_tangan'     => $nama_yang_bertanda,
            'jabatan_yang_bertanda_tangan'  => $jabatan_yang_bertanda,
            'alamat'                        => $alamat,
            'nama_dosen'                    => $nama_dosen,
            'jabatan'                       => $jabatan,
            'nama_mahasiswa'                => $nama_mahasiswa,
            'keperluan'                     => $keperluan,
            'judul_penelitian'              => $judul_penelitian,
            'tanggal'                       => $tanggal,
            'tujuan'                        => $tujuan
        ];

        if($this->form_validation->run($data, 'tugas_penelitian') == FALSE){
			session()->setFlashData('error_tugas_penelitian', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/home/tugas_penelitian');
        }else{
            $cek = $this->limit_pengajuan->cek_limit_tugas_pengabdian($nama_dosen);

            if($cek[0]['total'] <= "2"){
                $this->tugas_penelitian->insert($data);

                $pesan = [
                    'judul' => 'TUGAS PENELITIAN',
                    'isi'   => 'Data Masuk Atas Nama '. $nama_dosen,
                ];
                $this->pusher->trigger('my-channel', 'my-event', $pesan);
                
                $this->limit_pengajuan->insert([
                    'nim_atau_nidn'     => $nama_dosen,
                    'nama'              => $nama_dosen,
                    'tanggal_pengajuan' => date('Y-m-d'),
                    'perihal'           => $keperluan,
                ]);

                return redirect()->to(base_url().'/home/tugas_penelitian')->with('sukses_tugas_penelitian','pengajuan surat berhasil silahkan konfirmasi ke pihak terkait');
            }else{
                return redirect()->to(base_url().'/home/tugas_penelitian')->with('Limit_pengajuan', 'Maaf, '.$nama_dosen.'. Anda Sudah Melebihi Batas Pengajuan Surat. Maximal Pengajuan harian 3x. silahkan ajukan di lain hari');
            }
        }
    }

// END MODUL INSERT DOSEN

/*

-
-

*/

// MODUL UPDATE DOSEN
    // UPDATE SURAT HKI 
    public function update_suratHKI(){
        $id                 = $this->request->getPost('id');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_pengajuan  = $this->request->getPost('tanggal_surat');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $pangkat            = $this->request->getPost('pangkat');
        $universitas        = $this->request->getPost('universitas');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $jenis_ciptaan      = $this->request->getPost('jenis_ciptaan');
        $judul              = $this->request->getPost('judul');
        $nomor_permohonan   = $this->request->getPost('nomor_permohonan');
        $tanggal_permohonan = $this->request->getPost('tanggal_permohonan');
        $nomor_pencatatan   = $this->request->getPost('nomor_pencatatan');
        $tahun_terbit       = $this->request->getPost('tahun_terbit');
        $bentuk_tugas       = $this->request->getPost('bentuk_tugas');
        $dikategorikan      = $this->request->getVar('dikategorikan');
        $nama_yang_bertanda_tangan      = $this->request->getVar('nama_yang_bertanda_tangan');
        $jabatan_yang_bertanda_tangan   = $this->request->getVar('jabatan_yang_bertanda_tangan');
        $pangkat_yang_bertanda_tangan   = $this->request->getVar('pangkat_yang_bertanda_tangan');
        $jabatan_bertandatangan         = $this->request->getVar('jabatan_bertandatangan');
        $pada_perguruan_tinggi          = $this->request->getVar('pada_perguruan_tinggi');

        $data = [
            'nomor_surat'        => $nomor_surat,
            'tanggal_pengajuan'  => $tanggal_pengajuan,
            'nama_dosen'         => $nama_dosen,
            'nidn'               => $nidn,
            'pangkat'            => $pangkat,
            'universitas'        => $universitas,
            'fakultas'           => $fakultas,
            'prodi'              => $prodi,
            'jenis_ciptaan'      => $jenis_ciptaan,
            'judul'              => $judul,
            'nomor_permohonan'   => $nomor_permohonan,
            'tanggal_permohonan' => $tanggal_permohonan,
            'nomor_pencatatan'   => $nomor_pencatatan,
            'tahun_terbit'       => $tahun_terbit,
            'dikategorikan'      => $dikategorikan,
            'bentuk_tugas'       => $bentuk_tugas,
            'nama_yang_bertanda_tangan'      => $nama_yang_bertanda_tangan,
            'jabatan_yang_bertanda_tangan'   => $jabatan_yang_bertanda_tangan,
            'pangkat_yang_bertanda_tangan'   => $pangkat_yang_bertanda_tangan,
            'jabatan_bertandatangan'         => $jabatan_bertandatangan,
            'pada_perguruan_tinggi'          => $pada_perguruan_tinggi
        ];

        if($this->form_validation->run($data, 'update_suratHKI') == FALSE){
			session()->setFlashData('error_update_suratHKI', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_suratHKI/'.$id);
        }else{
            $this->surat_tugas_hki->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $bentuk_tugas,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $bentuk_tugas,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_suratHKI/'.$id)->with('sukses_update_suratHKI','Data surat tugas HKI <strong>'. $nama_dosen .'</strong> Berhasil Di Update.');
        }
    }

    // UPDATE PUBLIKASI
    public function update_publikasi(){
        $id                 = $this->request->getPost('id');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $universitas        = $this->request->getPost('universitas');
        $bentuk_tugas       = $this->request->getPost('bentuk_tugas');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $pangkat            = $this->request->getPost('pangkat');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $judul              = $this->request->getPost('judul');
        $nama_jurnal        = $this->request->getPost('nama_jurnal');
        $nomor_dan_volume   = $this->request->getPost('nomor_dan_volume');
        $issn               = $this->request->getPost('issn');
        $penerbit           = $this->request->getPost('penerbit');
        $kategori_jurnal    = $this->request->getPost('kategori_jurnal');
        $tanggal_terbit     = $this->request->getPost('tanggal_terbit');
        $dikategorikan      = $this->request->getPost('dikategorikan');
    
        $data = [
            'nomor_surat'       => $nomor_surat,
            'tanggal_masuk'     => $tanggal_masuk,
            'universitas'       => $universitas,
            'bentuk_tugas'      => $bentuk_tugas,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'pangkat'           => $pangkat,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'judul'             => $judul,
            'nama_jurnal'       => $nama_jurnal,
            'nomor_dan_volume'  => $nomor_dan_volume,
            'issn'              => $issn,
            'penerbit'          => $penerbit,
            'kategori_jurnal'   => $kategori_jurnal,
            'tanggal_terbit'    => $tanggal_terbit,
            'dikategorikan'     => $dikategorikan
        ];

        if($this->form_validation->run($data, 'update_publikasi') == FALSE){
			session()->setFlashData('error_update_suratPublikasi', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_suratPublikasi/'.$id);
        }else{
            $this->surat_tugas_publikasi->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $bentuk_tugas,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $bentuk_tugas,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_suratPublikasi/'.$id)->with('sukses_update_suratPublikasi','Data surat tugas Publikasi <strong>'. $nama_dosen .'</strong> Berhasil Di Update.');
        }
    }

    // UPDATE ORAL PRESENTASI
    public function update_oralPresentasi(){
        $id                 = $this->request->getPost('id');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $pangkat            = $this->request->getPost('pangkat');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $universitas        = $this->request->getPost('universitas');
        $bentuk_kegiatan    = $this->request->getPost('bentuk_kegiatan');
        $nama_kegiatan    = $this->request->getPost('nama_kegiatan');
        $judul              = $this->request->getPost('judul');
        $tanggal            = $this->request->getPost('tanggal');
        $dikategorikan      = $this->request->getPost('dikategorikan');

        $data = [
            'nomor_surat'       => $nomor_surat,
            'tanggal_masuk'     => $tanggal_masuk,
            'nama'              => $nama_dosen,
            'nidn'              => $nidn,
            'pangkat'           => $pangkat,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'universitas'       => $universitas,
            'bentuk_kegiatan'   => $bentuk_kegiatan,
            'nama_kegiatan'     => $nama_kegiatan,
            'judul'             => $judul,
            'tanggal'           => $tanggal,
            'dikategorikan'     => $dikategorikan
        ];

        if($this->form_validation->run($data, 'oral_presentasi') == FALSE){
            session()->setFlashData('error_edit_oral_presentasi', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_oralPresentasi/'.$id);
        }else{
            $this->oral_presentasi->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $bentuk_kegiatan,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $bentuk_kegiatan,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_oralPresentasi/'.$id)->with('sukses_update_oralPresentasi','Data oral presentasi <strong>'. $nama_dosen .'</strong> Berhasil Di Update.');
        }
    }

    // UPDATE ETHICAL CLEARENCE
    public function update_ethicalClearance(){
        $id                 = $this->request->getPost('id');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $lampiran           = $this->request->getPost('lampiran');
        $perihal            = $this->request->getPost('perihal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $fakultas           = $this->request->getPost('fakultas');
        $universitas        = $this->request->getPost('universitas');
        $prodi              = $this->request->getPost('prodi');
        $nama_peneliti      = $this->request->getPost('nama_peneliti');
        $nidn               = $this->request->getPost('nidn');
        $judul_penelitian   = $this->request->getPost('judul_penelitian');
        $nama_yang_bertanda_tangan    = $this->request->getPost('nama_yang_bertanda_tangan');
        $nik_yang_bertanda_tangan     = $this->request->getPost('nik_yang_bertanda_tangan');

        $data = [
            'nomor_surat'       => $nomor_surat,
            'tanggal_masuk'     => $tanggal_masuk,
            'lampiran'          => $lampiran,
            'perihal'           => $perihal,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'fakultas'          => $fakultas,
            'universitas'       => $universitas,
            'prodi'             => $prodi,
            'nama_peneliti'     => $nama_peneliti,
            'nidn'              => $nidn,
            'judul_penelitian'  => $judul_penelitian,
            'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
            'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
        ];

        if($this->form_validation->run($data, 'izin_ethical_clearance') == FALSE){
            session()->setFlashData('error_edit_ethical_clearance', $this->form_validation->getErrors());
            return redirect()->to(base_url().'/admin/edit_ethical/'.$id);
        }else{
            $this->izin_ethical_clearance->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_peneliti,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_peneliti,
                    'tahun'                 => date('Y'),
                    'hal'               => $perihal,
                    'ditujukan_kepada'  => $ditujukan_kepada,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_ethical/'.$id)->with('sukses_update_ethical','Data Ethical Clearence <strong>'. $nama_peneliti .'</strong> Berhasil Di Update.');
        }
    }

    // UPDATE IZIN PENELITIAN
    public function update_izinPenelitian(){
        $id                 = $this->request->getPost('id');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $lampiran           = $this->request->getPost('lampiran');
        $perihal            = $this->request->getPost('perihal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $fakultas           = $this->request->getPost('fakultas');
        $universitas        = $this->request->getPost('universitas');
        $prodi              = $this->request->getPost('prodi');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $nama_mahasiswa     = $this->request->getPost('nama_mahasiswa');
        $nim                = $this->request->getPost('nim');
        $judul_penelitian   = $this->request->getPost('judul_penelitian'); 
        $nama_yang_bertanda_tangan   = $this->request->getPost('nama_yang_bertanda_tangan'); 
        $nik_yang_bertanda_tangan    = $this->request->getPost('nik_yang_bertanda_tangan'); 

        $data = [
            'nomor_surat'       => $nomor_surat,
            'tanggal_masuk'     => $tanggal_masuk,
            'lampiran'          => $lampiran,
            'perihal'           => $perihal,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'fakultas'          => $fakultas,
            'universitas'       => $universitas,
            'prodi'             => $prodi,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'nama_mahasiswa'    => $nama_mahasiswa,
            'nim'               => $nim,
            'judul_penelitian'  => $judul_penelitian,
            'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
            'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
        ];

        if($this->form_validation->run($data, 'izin_penelitian') == FALSE){
            session()->setFlashData('error_edit_izinPenelitian', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_izinPenelitian/'.$id);
        }else{
            $this->izin_penelitian->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_izinPenelitian/'.$id)->with('sukses_update_izinPenelitian','Data Izin Penelitian <strong>'. $nama_dosen .'</strong> Berhasil Di Update.');
        }
    }

    // UPDATE PENGABDIAN MASYARAKAT
    public function update_pengabdianMasyarakat(){
        $id                 = $this->request->getPost('id');
        $nomor_surat        = $this->request->getPost('nomor_surat');
        $tanggal_masuk      = $this->request->getPost('tanggal_masuk');
        $lampiran           = $this->request->getPost('lampiran');
        $perihal            = $this->request->getPost('perihal');
        $ditujukan_kepada   = $this->request->getPost('ditujukan_kepada');
        $fakultas           = $this->request->getPost('fakultas');
        $prodi              = $this->request->getPost('prodi');
        $universitas        = $this->request->getPost('universitas');
        $nama_dosen         = $this->request->getPost('nama_dosen');
        $nidn               = $this->request->getPost('nidn');
        $nama_mahasiswa     = $this->request->getPost('nama_mahasiswa');
        $nim                = $this->request->getPost('nim');
        $judul_pengabdian   = $this->request->getPost('judul_pengabdian');
        $nama_yang_bertanda_tangan   = $this->request->getPost('nama_yang_bertanda_tangan');
        $nik_yang_bertanda_tangan   = $this->request->getPost('nik_yang_bertanda_tangan');

        $data = [
            'nomor_surat'       => $nomor_surat,
            'tanggal_masuk'     => $tanggal_masuk,
            'lampiran'          => $lampiran,
            'perihal'           => $perihal,
            'ditujukan_kepada'  => $ditujukan_kepada,
            'fakultas'          => $fakultas,
            'prodi'             => $prodi,
            'universitas'       => $universitas,
            'nama_dosen'        => $nama_dosen,
            'nidn'              => $nidn,
            'nama_mahasiswa'    => $nama_mahasiswa,
            'nim'               => $nim,
            'judul_pengabdian'  => $judul_pengabdian,
            'nama_yang_bertanda_tangan' => $nama_yang_bertanda_tangan,
            'nik_yang_bertanda_tangan'  => $nik_yang_bertanda_tangan
        ];

        if($this->form_validation->run($data, 'pengabdian_masyarakat') == FALSE){
			session()->setFlashData('error_edit_pengabdianMasyarakat', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_pengabdianMasyarakat'.$id);
        }else{
            $this->izin_pengabdian_masyarakat->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $perihal,
                    'ditujukan_kepada'      => $ditujukan_kepada,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_pengabdianMasyarakat/'.$id)->with('sukses_update_pengabdianMasyarakat','Data Pengabdian Masyarakat <strong>'. $nama_dosen .'</strong> Berhasil Di Update.');
        }
    }

    // UPDATE TUGAS PENGABDIAN
    public function update_tugasPengabdian(){
        $id                     = $this->request->getPost('id');
        $nomor_surat            = $this->request->getPost('nomor_surat'); 
        $tanggal_masuk          = $this->request->getPost('tanggal_masuk');
        $nama_yang_bertanda     = $this->request->getPost('nama_yang_bertanda_tangan');
        $jabatan_yang_bertanda  = $this->request->getPost('jabatan_yang_bertanda_tangan');
        $alamat                 = $this->request->getPost('alamat');
        $nama_dosen             = $this->request->getPost('nama_dosen');
        $jabatan                = $this->request->getPost('jabatan');
        $nama_mahasiswa         = $this->request->getPost('nama_mahasiswa');
        $keperluan              = $this->request->getPost('keperluan');
        $tanggal                = $this->request->getPost('tanggal');
        $tujuan                 = $this->request->getPost('tujuan');

        $data = [
            'nomor_surat'                   => $nomor_surat,
            'tanggal_masuk'                 => $tanggal_masuk,
            'nama_yang_bertanda_tangan'     => $nama_yang_bertanda,
            'jabatan_yang_bertanda_tangan'  => $jabatan_yang_bertanda,
            'alamat'                        => $alamat,
            'nama_dosen'                    => $nama_dosen,
            'jabatan'                       => $jabatan,
            'nama_mahasiswa'                => $nama_mahasiswa,
            'keperluan'                     => $keperluan,
            'tanggal'                       => $tanggal,
            'tujuan'                        => $tujuan
        ];

        if($this->form_validation->run($data, 'tugasPengabdian') == FALSE){
			session()->setFlashData('error_tugas_pengabdian', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_tugasPengabdian/'.$id);
        }else{
            $this->tugas_pengabdian->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $keperluan,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $keperluan
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_tugas_pengabdian/'.$id)->with('update_tugas_pengabdian','Surat Dengan Nama ' .$nama_dosen. ' Berhasil Di update');
        }
    }

    // UPDATE TUGAS PENELITIAN
    public function update_tugasPenelitian(){
        $id                     = $this->request->getPost('id');
        $nomor_surat            = $this->request->getPost('nomor_surat'); 
        $tanggal_masuk          = $this->request->getPost('tanggal_masuk');
        $nama_yang_bertanda     = $this->request->getPost('nama_yang_bertanda_tangan');
        $jabatan_yang_bertanda  = $this->request->getPost('jabatan_yang_bertanda_tangan');
        $alamat                 = $this->request->getPost('alamat');
        $nama_dosen             = $this->request->getPost('nama_dosen');
        $jabatan                = $this->request->getPost('jabatan');
        $nama_mahasiswa         = $this->request->getPost('nama_mahasiswa');
        $keperluan              = $this->request->getPost('keperluan');
        $judul_penelitian       = $this->request->getPost('judul_penelitian');
        $tanggal                = $this->request->getPost('tanggal');
        $tujuan                 = $this->request->getPost('tujuan');
        
        $data = [
            'nomor_surat'                   => $nomor_surat,
            'tanggal_masuk'                 => $tanggal_masuk,
            'nama_yang_bertanda_tangan'     => $nama_yang_bertanda,
            'jabatan_yang_bertanda_tangan'  => $jabatan_yang_bertanda,
            'alamat'                        => $alamat,
            'nama_dosen'                    => $nama_dosen,
            'jabatan'                       => $jabatan,
            'nama_mahasiswa'                => $nama_mahasiswa,
            'keperluan'                     => $keperluan,
            'judul_penelitian'              => $judul_penelitian,
            'tanggal'                       => $tanggal,
            'tujuan'                        => $tujuan
        ];
        if($this->form_validation->run($data, 'tugas_penelitian') == FALSE){
			session()->setFlashData('error_tugas_pengabdian', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/edit_tugasPenelitian/'.$id);
        }else{
            $this->tugas_penelitian->update($id, $data);

            $cek = $this->nomor_surat->cek($nomor_surat);
            if($cek == null){
                $this->nomor_surat->insert([
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $keperluan,
                ]);
            }else{
                $this->nomor_surat->update($cek[0]['nomor_surat'], [
                    'nomor_surat'           => $nomor_surat,
                    'nama_pemilik_surat'    => $nama_dosen,
                    'tahun'                 => date('Y'),
                    'hal'                   => $keperluan,
                ]);
            }
            return redirect()->to(base_url().'/admin/lihat_tugasPenelitian/'.$id)->with('update_tugas_penelitian','Surat Dengan Nama ' . $nama_dosen . ' Berhasil Di update');
        }
    }
    
// END MODUL UPDATE DOSEN

/*

-
-
-

*/

// MODUL DELETE MAHASISWA 
    // DELETE STUDI PENDAHULUAN
    public function hapus_studiPendahuluan($id){
        $this->studiPendahuluan->delete($id);
        return redirect()->to(base_url('/admin/studiPendahuluan'))->with('success_delete', 'Data berhasil di hapus');
    }

    // HAPUS PENGAJUAN PENELITIAN
    public function hapusPengajuanPenelitian($id){
        $this->pengajuanPenelitian->delete($id);
        return redirect()->to(base_url('/admin/pengajuanPenelitian'))->with('success_delete_pegajuan_penelitian', 'Data berhasil di hapus');
    }

    // HAPUS UJI VALIDITAS
    public function hapus_ujiValiditas($id){
        $this->ujiValiditas->delete($id);
        return redirect()->to(base_url('/admin/ujiValiditas'))->with('success_delete_ujiValiditas', 'Data berhasil di hapus');
    }

    // HAPUS DETEMINASI TANAMAN
    public function hapus_determinasiTanaman(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');
        
        $this->determinasi_tanaman->delete($id);
        return redirect()->to(base_url().'/admin/determinasi_tanaman')->with('hapus_determinasiTanaman', 'Data surat Determinasi Tanaman dengan nama '. $nama .'  berhasil dihapus');
    }
    
    // HAPUS IZIN PENGABDIAN MASYARAKAT
    public function hapus_pengabdianMasyarakat(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');

        $this->izin_pengabdian_masyarakat->delete($id);
        return redirect()->to(base_url().'/admin/izin_pengabdianMasyarakat')->with('hapus_pengabdianMasyarakat', 'Data surat Izin pengabdian masyarakat dengan nama '. $nama .'  berhasil dihapus');
    }

    // 

// END DELETE MAHASISWA

/*

-
-
-

*/

// MODUL DELETE DOSEN
    // HAPUS MEMO SURAT TUGAS HKI
    public function hapusHKI(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');

        $this->surat_tugas_hki->delete($id);
        return redirect()->to(base_url().'/admin/suratTugasHKI')->with('hapusHKI', 'Data surat dengan nama '. $nama .'  berhasil dihapus');
    }

    // HAPUS SURAT TUGAS PUBLIKASI
    public function hapusPublikasi(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');

        $this->surat_tugas_publikasi->delete($id);
        return redirect()->to(base_url().'/admin/suratPublikasi')->with('hapusPublikasi', 'Data surat Publikasi dengan nama '. $nama .'  berhasil dihapus');
    }

    // HAPUS SURAT TUGAS ORAL PRESENTASI
    public function hapus_oralPresentasi(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');

        $this->oral_presentasi->delete($id);
        return redirect()->to(base_url().'/admin/oral_presentasi')->with('hapus_oralPresentasi', 'Data Oral Presentasi dengan nama '. $nama .'  berhasil dihapus');
    }

    // HAPUS SURAT TUGAS ETHICAL CLEARENCE
    public function hapus_ethical(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');

        $this->izin_ethical_clearance->delete($id);
        return redirect()->to(base_url().'/admin/ethical')->with('hapus_ethical', 'Data ethical clearance dengan nama '. $nama .'  berhasil dihapus');
    }

    // HAPUS SURAT IZIN PENELITIAN
    public function hapus_izinPenelitian(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');

        $this->izin_penelitian->delete($id);
        return redirect()->to(base_url().'/admin/izin_penelitian')->with('hapus_izinPenelitian', 'Data surat izin penelitian dengan nama '. $nama .'  berhasil dihapus');
    }
    
    // HAPUS SURAT TUGAS PENGABDIAN MASYARAKAT
    public function hapus_tugasPengabdian(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');
        
        $this->tugas_pengabdian->delete($id);
        return redirect()->to(base_url().'/admin/tugas_pengabdian')->with('hapus_tugas_pengabdian', 'Data surat Tugas Pengabdian dengan nama '. $nama .'  berhasil dihapus');
    }

    // HAPUS SURAT TUGAS PENELITIAN
    public function hapus_tugasPenelitian(){
        $nama   = $this->request->getVar('nama');
        $id     = $this->request->getVar('id');
        
        $this->tugas_penelitian->delete($id);
        return redirect()->to(base_url().'/admin/tugas_penelitian')->with('hapus_tugasPenelitian', 'Data surat Tugas Penelitian dengan nama '. $nama .'  berhasil dihapus');
    }

// END MODUL DELETE DOSEN

/*

-
-

*/


// TOOLS

    // PENYESUAIAN NOMOR SURAT
    public function sesuaikan_nomor_surat(){
        $dimulai_dari = $this->request->getVar('dimulai_dari');
        $jumlah  = $this->nomor_surat->jumlah_surat_yang_telah_terbit();
        
        $jumlah_int = intval($jumlah[0]['total']);
        
        if($dimulai_dari != ''){
            $loop_sebanyak = ($dimulai_dari-1) - $jumlah_int;
            if(intval($dimulai_dari) <= $jumlah_int){
                return redirect()->to(base_url().'/admin/penyesuaian_nomor')->with('error_jumlah','Nomor Dimulai Surat Tidak Boleh Kurang Dari Nomor Surat Sekarang');
            }else{
                for($x=1; $x<=$loop_sebanyak; $x++){
                    $data = [
                        'nomor_surat'       => $x."/PT/LPPM/V/2022",
                        'tahun'             => "2022",
                        'nama_pemilik_surat'=> 'Belum DI Update Ke-Sistem'
                    ];
                    $this->nomor_surat->insert($data);
                    echo $x."/PT/LPPM/V/2022"."<br>";
                }
                return redirect()->to(base_url().'/admin/penyesuaian_nomor')->with('suskes','Nomor Dimulai Surat Berhasil Di Sesuaikan. Sekarang Nomor Surat Di Mulai Dari '.$dimulai_dari);
            }
        }else{
            return redirect()->to(base_url().'/admin/penyesuaian_nomor')->with('error_jumlah','Nomor Dimulai Surat Tidak Boleh Kosong');
        }
    }


    // public function export_excell(){
    //     $dari_bulan     = $this->request->getVar('dari_bulan');
    //     $sampai_bulan   = $this->request->getVar('sampai_bulan');
    //     $tahun          = $this->request->getVar('tahun');
    //     $data = [
    //         'dari_bulan'    => $dari_bulan,
    //         'sampai_bulan'  => $sampai_bulan,
    //         'tahun'         => $tahun
    //     ];
    //     if($this->form_validation->run($data, 'export_error_pdf') == FALSE){
	// 		session()->setFlashData('export_error_excell', $this->form_validation->getErrors());
	// 		return redirect()->to(base_url().'/admin/export_laporan');
    //     }else{

    //     }
    // }

    public function tambah_user(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama     = $this->request->getPost('nama');
        $role     = $this->request->getPost('role');

        $data = [
            'username'  => $username,
            'password'  => $password,
            'nama'      => $nama,
            'role'      => $role
        ];

        if($this->form_validation->run($data, 'tambah_user') == FALSE){
			session()->setFlashData('error_tambah_user', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/tambah_user');
        }else{
            $this->user->insert($data);
            return redirect()->to(base_url().'/admin/user_page')->with('sukses_user', 'berhasil menambahkan user baru');
        }
    }

    public function hapus_user($id){
        $username = $_GET['username'];
        // dd($username);
        if($username != session()->username){
            $this->user->delete($id);
            return redirect()->to(base_url().'/admin/user_page')->with('sukses_hapus', 'behasil menghapsu user');    
        } else {
            return redirect()->to(base_url().'/admin/user_page')->with('gagal_hapus', 'Anda tidak bisa menghapus diri anda sendiri');
        }
    }

    public function update_user(){
        $id         = $this->request->getPost('id');
        $usename    = $this->request->getPost('username');
        $nama       = $this->request->getPost('nama');
        $password   = $this->request->getPost('password');
        $role   = $this->request->getPost('role');
        $data = [
            'username' => $usename,
            'nama'     => $nama,
            'password' => $password,
            'role'     => $role

        ];
        if($this->form_validation->run($data, 'edit_user') == FALSE){
			session()->setFlashData('error_edit_user', $this->form_validation->getErrors());
			return redirect()->to(base_url().'/admin/tambah_user');
        }else{
            $this->user->update($id, $data);
            if($usename == session()->username){
                return redirect()->to(base_url().'/auth');
            }else{
                return redirect()->to(base_url().'/admin/user_page')->with('sukses_edit', 'berhasil mengubah user');
            }
        }
    }


    

/*

-
-

*/


// TIDAK TERPAKAI
    // surat tugas
    public function insertPengajuan_suratTugas(){
        $nama_bertandatangan    = $this->request->getPost('nama_bertandatangan');
        $jabatan_bertandatangan = $this->request->getPost('jabatan_bertandatangan');
        $alamat_bertandatangan  = $this->request->getPost('alamat_bertandatangan');
        $nama_dosen             = $this->request->getPost('nama_dosen');
        $jabatan                = $this->request->getPost('jabatan');
        $nama_mahasiswa         = $this->request->getPost('nama_mahasiswa');
        $keperluan              = $this->request->getPost('keperluan');
        $tanggal_pelaksanaan    = $this->request->getPost('tanggal_pelaksanaan');
        $tujuan                 = $this->request->getPost('tujuan');
        $tanggal_pengajuan      = $this->request->getPost('tanggal_pengajuan');

        $data = [
            'nama_bertandatangan'   => $nama_bertandatangan,
            'jabatan_bertandatangan'=> $jabatan_bertandatangan,
            'alamat_bertandatangan' => $alamat_bertandatangan,
            'nama_dosen'            => $nama_dosen,
            'jabatan'               => $jabatan,
            'nama_mahasiswa'        => $nama_mahasiswa,
            'keperluan'             => $keperluan,
            'tanggal_pelaksanaan'   => $tanggal_pelaksanaan,
            'tujuan'                => $tujuan,
            'tanggal_pengajuan'     => $tanggal_pengajuan
        ];

        if($this->form_validation->run($data, 'insertpengajuanSuratTugas') == FALSE){
			session()->setFlashData('inputs', $this->request->getVar());
			session()->setFlashData('errors', $this->form_validation->getErrors());
			return redirect()->to(base_url('/home/dosen_suratTugas'));
		}else{
            $this->pengajuanSuratTugas->insert([
                'nama_bertandatangan'   => $nama_bertandatangan,
                'jabatan_bertandatangan'=> $jabatan,
                'alamat_bertandatangan' => $alamat_bertandatangan,
                'nama_dosen'            => $nama_dosen,
                'jabatan'               => $jabatan,
                'nama_mahasiswa'        => $nama_mahasiswa,
                'keperluan'             => $keperluan,
                'tanggal_pelaksanaan'   => $tanggal_pelaksanaan,
                'tujuan'                => $tujuan,
                'tanggal_pengajuan'     => $tanggal_pengajuan
            ]);
            $pesan = [
                'judul' => 'STUDI SURAT TUGAS',
                'isi'   => 'Data Masuk Atas Nama',
                'nama'  =>  $nama_dosen,
            ];
            $this->pusher->trigger('my-channel', 'my-event', $pesan);
            session()->setFlashData('success', 'Pengajuan Berhasil Silahkan konfirmasi ke bagian LPPM');
            return redirect()->to(base_url('/home/dosen_suratTugas'));
        }
    }

    public function update_suratTugas(){
        $id = $this->request->getPost('id');
        $nomor_surat            = $this->request->getPost('nomor_surat');
        $nama_bertandatangan    = $this->request->getPost('nama_bertandatangan');
        $jabatan_bertandatangan = $this->request->getPost('jabatan_bertandatangan');
        $alamat_bertandatangan  = $this->request->getPost('alamat_bertandatangan');
        $nama_dosen             = $this->request->getPost('nama_dosen');
        $jabatan                = $this->request->getPost('jabatan');
        $nama_mahasiswa         = $this->request->getPost('nama_mahasiswa');
        $keperluan              = $this->request->getPost('keperluan');
        $tanggal_pelaksanaan    = $this->request->getPost('tanggal_pelaksanaan');
        $tujuan                 = $this->request->getPost('tujuan');
        $tanggal_pengajuan      = $this->request->getPost('tanggal_pengajuan');

        $data = [
            'nomor_surat'           => $nomor_surat,
            'nama_bertandatangan'   => $nama_bertandatangan,
            'jabatan_bertandatangan'=> $jabatan_bertandatangan,
            'alamat_bertandatangan' => $alamat_bertandatangan,
            'nama_dosen'            => $nama_dosen,
            'jabatan'               => $jabatan,
            'nama_mahasiswa'        => $nama_mahasiswa,
            'keperluan'             => $keperluan,
            'tanggal_pelaksanaan'   => $tanggal_pelaksanaan,
            'tujuan'                => $tujuan,
            'tanggal_pengajuan'     => $tanggal_pengajuan
        ];

        if($this->form_validation->run($data, 'pengajuanSuratTugas') == FALSE){
			session()->setFlashData('inputs_edit', $this->request->getVar());
			session()->setFlashData('errors_edit', $this->form_validation->getErrors());
			return redirect()->to(base_url('/admin/edit/'.$id));
		}else{
            $this->pengajuanSuratTugas->update($id, [
                'nomor_surat'           => $nomor_surat,
                'nama_bertandatangan'   => $nama_bertandatangan,
                'jabatan_bertandatangan'=> $jabatan_bertandatangan,
                'alamat_bertandatangan' => $alamat_bertandatangan,
                'nama_dosen'            => $nama_dosen,
                'jabatan'               => $jabatan,
                'nama_mahasiswa'        => $nama_mahasiswa,
                'keperluan'             => $keperluan,
                'tanggal_pelaksanaan'   => $tanggal_pelaksanaan,
                'tujuan'                => $tujuan,
                'tanggal_pengajuan'     => $tanggal_pengajuan
            ]);
            session()->setFlashData('success_edit', 'behasil di edit');
            return redirect()->to(base_url('/admin/lihat/'.$id));
        }
    }
    

    public function hapusSt($id){
        $this->pengajuanSuratTugas->delete($id);
        return redirect()->to(base_url('/admin/suratTugas'))->with('success_delete', 'Data berhasil di hapus');
    }

// END TIDAK TERPAKAI

}