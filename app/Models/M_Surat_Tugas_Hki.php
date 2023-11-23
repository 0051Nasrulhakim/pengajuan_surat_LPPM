<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Surat_Tugas_Hki extends Model
{
    protected $table      = 'surat_tugas_hki';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nama_yang_bertanda_tangan','nidn_yang_bertanda_tangan','pangkat_yang_bertanda_tangan','jabatan_bertandatangan','pada_perguruan_tinggi','tanggal_masuk','nama_dosen','nidn','pangkat','universitas','fakultas','prodi','jenis_ciptaan','judul','nomor_permohonan','tanggal_permohonan','nomor_pencatatan','tahun_terbit','dikategorikan','nomor_surat','status','bentuk_tugas'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM surat_tugas_hki WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM surat_tugas_hki WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM surat_tugas_hki WHERE nidn LIKE '%$nim_atau_nidn%';")->getResultArray();
    }
}