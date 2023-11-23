<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_UjiValiditas extends Model
{
    protected $table      = 'uji_validitas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','nama_yang_bertanda_tangan','nik_yang_bertanda_tangan','lampiran','hal','tanggal_surat','ditujukan_kepada','prodi_mhs','fakultas_mhs','universitas','tahun_akademik','nama','nim','alamat_mhs','dosen_pembimbing','judul_penelitian','status','nomor_telfon'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM uji_validitas WHERE status =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM uji_validitas WHERE status =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM uji_validitas WHERE nim = '$nim_atau_nidn';")->getResultArray();
    }
}