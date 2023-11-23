<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Tugas_Pengabdian extends Model
{
    protected $table      = 'tugas_pengabdian';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','nama_yang_bertanda_tangan','jabatan_yang_bertanda_tangan','alamat','nama_dosen','jabatan','nama_mahasiswa','keperluan','tanggal','tujuan','tanggal_masuk','status'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM tugas_pengabdian WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM tugas_pengabdian WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nama_dosen){
        return $this->db->query("SELECT * FROM tugas_pengabdian WHERE nama_dosen LIKE '%$nama_dosen%'")->getResultArray();
    }
}