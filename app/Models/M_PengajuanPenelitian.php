<?php

namespace App\Models;

use CodeIgniter\Model;

class M_PengajuanPenelitian extends Model
{
    protected $table      = 'pengajuan_penelitian';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['status_pengajuan','nim_mahasiswa','nama_mahasiswa','prodi_mhs','fakultas_mhs','tahun_akademik','nomor_telfon','dosen_pembimbing','judul_penelitian','tanggal_masuk','status','nomor_surat','lampiran','hal','ditujukan_kepada','universitas','alamat'];

    public function getPenelitianBelumTercetak()
    {
        return $query = $this->db->query('SELECT *FROM pengajuan_penelitian WHERE status=1')->getResultArray(); 
    }
    public function getPenelitianSudahTercetak()
    {
        return $query = $this->db->query('SELECT *FROM pengajuan_penelitian WHERE status=2')->getResultArray(); 
    }
    public function cek_pengajuan_surat($nim_atau_nidn){
        return $this->db->query("SELECT * FROM pengajuan_penelitian WHERE nim_mahasiswa = '$nim_atau_nidn';")->getResultArray();
    }
}