<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Izin_Ethical_Clearance extends Model
{
    protected $table      = 'ethical_clearense';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','tanggal_masuk','nama_yang_bertanda_tangan','nik_yang_bertanda_tangan','lampiran','perihal','ditujukan_kepada','fakultas','universitas','prodi','nama_peneliti','nidn','judul_penelitian','status'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM ethical_clearense WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM ethical_clearense WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM ethical_clearense WHERE nidn LIKE '%$nim_atau_nidn%';")->getResultArray();
    }
}