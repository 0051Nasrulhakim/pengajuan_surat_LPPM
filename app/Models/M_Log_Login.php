<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Log_Login extends Model
{
    protected $table      = 'log_login';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['username','login_at','logout_at','ip','browser'];

    public function log_out(){
        $user = session()->username;
        $tanggal = date('Y-m-d');
        $tanggal_logut = date('Y-m-d H:i:s'); 
        return $this->db->query("UPDATE log_login SET logout_at = '$tanggal_logut' WHERE username = '$user' AND login_at LIKE '$tanggal%'");
    }
}