<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Oral_Presentasi extends Model
{
    protected $table      = 'oral_presentasi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','nama_yang_bertanda_tangan','pangkat_yang_bertanda-Tangan','jabatan_masyarakat','pada_perguruan_tinggi','nama','nidn','pangkat','fakultas','prodi','universitas','bentuk_kegiatan','judul','nama_kegiatan','tanggal','dikategorikan','tanggal_masuk','status'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM oral_presentasi WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM oral_presentasi WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM oral_presentasi WHERE nidn LIKE '%$nim_atau_nidn%';")->getResultArray();
    }
}