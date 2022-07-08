<?php 

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model{
    protected $table = 'warga';
    protected $primaryKey = 'idWarga';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['idWarga', 'nik', 'namaWarga', 'kelamin', 'alamat', 'noRumah', 'status'];

}