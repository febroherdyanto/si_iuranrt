<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class IuranModel extends Model{
    protected $table = 'iuran';
    protected $primaryKey = 'idIuran';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['idIuran', 'idWarga', 'keterangan', 'tanggal', 'bulan', 'tahun', 'jumlah'];
    protected $db;
    
    
    function add($data){
        return $this->db
        ->table($this->table)
        ->insert($data);
    }
    
}