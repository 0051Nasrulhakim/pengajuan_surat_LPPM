<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Surat_Izin_Pengabdian_Masyarakat extends Model
{
    protected $table      = 'pengabdian_masyarakat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','lampiran','perihal','tanggal_masuk','ditujukan_kepada','nama_yang_bertanda_tangan','nik_yang_bertanda_tangan','fakultas','prodi','universitas','nama_dosen','nidn','nama_mahasiswa','nim','judul_pengabdian','status'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM pengabdian_masyarakat WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM pengabdian_masyarakat WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM pengabdian_masyarakat WHERE nidn LIKE '%$nim_atau_nidn%';")->getResultArray();
    }
}