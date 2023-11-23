<?php 

namespace App\Models;

use CodeIgniter\Model;

class Nomor_surat extends Model
{
    protected $table      = 'nomor_surat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_surat','tahun','nama_pemilik_surat','hal', 'ditujukan_kepada'];
    
     public function nomor_surat(){
        $tahun = date('Y');
        return $this->db->query("SELECT COUNT(nomor_surat)+1 AS total FROM nomor_surat WHERE tahun=$tahun")->getResultArray();
     }
     public function cek($params){
        return $this->db->query("SELECT * FROM `nomor_surat` WHERE nomor_surat = '$params'")->getResultArray();
     }

     public function jumlah_surat_yang_telah_terbit(){
         $tahun = date('Y');
         return $this->db->query("SELECT COUNT(nomor_surat) AS total FROM nomor_surat WHERE tahun=$tahun")->getResultArray();
     }

     public function cetak($d){
         $tahun = $d['tahun'];
         $bulan = $d['bulan'];
        return $this->db->query("SELECT * FROM nomor_surat WHERE tahun = '$tahun' AND nomor_surat LIKE '%$bulan%'")->getResultArray();
     }

     public function cetak_semua($tahun){
        return $this->db->query("SELECT * FROM `nomor_surat` where tahun = '$tahun'")->getResultArray();
     }
     
}