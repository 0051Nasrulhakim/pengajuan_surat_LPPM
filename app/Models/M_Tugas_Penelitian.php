<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Tugas_Penelitian extends Model
{
    protected $table      = 'tugas_penelitian';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','nama_yang_bertanda_tangan','jabatan_yang_bertanda_tangan','alamat','nama_dosen','jabatan','nama_mahasiswa','judul_penelitian','keperluan','tanggal','tujuan','tanggal_masuk','status'];

    public function belum_tercetak(){
        return $this->db->query("SELECT * FROM tugas_penelitian WHERE `status` =1")->getResultArray();
    }

    public function tercetak(){
        return $this->db->query("SELECT * FROM tugas_penelitian WHERE `status` =2")->getResultArray();
    }
    public function cek_pengajuan_surat($nama_dosen){
        return $this->db->query("SELECT * FROM tugas_penelitian WHERE nama_dosen LIKE '%$nama_dosen%'")->getResultArray();
    }
}