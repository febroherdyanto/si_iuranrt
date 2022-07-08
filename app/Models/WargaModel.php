<?php 

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class WargaModel extends Model{
    protected $table = 'warga';
    protected $primaryKey = 'idWarga';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['idWarga', 'nik', 'namaWarga', 'kelamin', 'alamat', 'noRumah', 'status'];
    protected $db;
    

    function add($data){
        return $this->db
        ->table($this->table)
        ->insert($data);
    }

}