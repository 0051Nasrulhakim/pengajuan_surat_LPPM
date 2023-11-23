<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Determinasi_Tanaman extends Model
{
    protected $table      = 'determinasi_tanaman';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nim_mahasiswa','nama_yang_bertanda_tangan','nik_yang_bertanda_tangan','nama_mahasiswa','prodi_mhs','fakultas_mhs','tahun_akademik','dosen_pembimbing','judul_penelitian','tanggal_masuk','status','nomor_surat','lampiran','hal','ditujukan_kepada','universitas','alamat','nomor_telfon'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM determinasi_tanaman WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM determinasi_tanaman WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM determinasi_tanaman WHERE nim_mahasiswa = '$nim_atau_nidn';")->getResultArray();
    }
}