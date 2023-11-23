<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_PengajuanSuratTugas extends Model
{
    protected $table      = 'pengajuan_surattugas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['tujuan','alamat_bertandatangan','nama_bertandatangan','jabatan_bertandatangan','nama_dosen','jabatan','keperluan','tanggal_pelaksanaan','nama_mahasiswa','tanggal_pengajuan','mengetahui','nomor_surat','status'];

    public function getSuratTugasBelumTercetak(){
        return $query = $this->db->query("SELECT * FROM pengajuan_surattugas WHERE status=1")->getResultArray();
    }
    public function getSuratTugasTercetak(){
        return $query = $this->db->query("SELECT * FROM pengajuan_surattugas WHERE status=2")->getResultArray();
    }
}