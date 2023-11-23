<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Limit_Pengajuan extends Model
{
    protected $table      = 'limit_pengajuan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id','nama', 'nim_atau_nidn','tanggal_pengajuan','perihal'];
    
    public function cek_limit($nim){
        $tanggal_pengajuan = date('Y-m-d');
        return $this->db->query("SELECT COUNT(nim_atau_nidn) AS total FROM limit_pengajuan WHERE tanggal_pengajuan = '$tanggal_pengajuan' AND nim_atau_nidn = '$nim'")->getResultArray();
    }
    public function cek_limit_tugas_pengabdian($nama_dosen){
        $tanggal_pengajuan = date('Y-m-d');
        return $this->db->query("SELECT COUNT(nama) AS total FROM limit_pengajuan WHERE tanggal_pengajuan = '$tanggal_pengajuan' AND nama = '$nama_dosen'")->getResultArray();
    }

}