<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Surat_Tugas_Publikasi extends Model
{
    protected $table      = 'surat_publikasi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','nama_yang_bertanda_tangan','pangkat_yang_bertanda-Tangan','jabatan_masyarakat','pada_perguruan_tinggi','nama_dosen','nidn','pangkat','fakultas','prodi','universitas','bentuk_tugas','judul','nama_jurnal','nomor_dan_volume','issn','penerbit','kategori_jurnal','tanggal_terbit','dikategorikan','tanggal_masuk','status'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM surat_publikasi WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM surat_publikasi WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM surat_publikasi WHERE nidn LIKE '%$nim_atau_nidn%';")->getResultArray();
    }
}