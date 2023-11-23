<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['username','password','nama','role'];

}