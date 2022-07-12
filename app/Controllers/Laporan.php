<?php

namespace App\Controllers;

use CodeIgniter\Config\View;

class Laporan extends BaseController
{
    public function unpaid()
    {
        $title = "Laporan Warga Belum Bayar";
        $link = "unpaid";

        return view('dataunpaid', compact('title', 'link'));
    }

    public function checks()
    {
        $title = "Laporan Warga Belum Bayar";
        $link = "checks";

        $db      = \Config\Database::connect();

        $bulan = $this->request->getPost('cekbulan');
        $tahun = $this->request->getPost('cektahun');

        $db      = \Config\Database::connect();
        $db = db_connect();
        $query = $db->query("select * from iuran where bulan='$bulan' and tahun='$tahun'");
        $data = $query->getResultArray();
        return view('checks', compact('title', 'link', 'bulan', 'tahun', 'data'));
    }

    public function content(){
        $title = "Laporan Warga Belum Bayar";
        $link = "dahsboard";
        
        $db      = \Config\Database::connect();
        $db = db_connect();
        
        $querywarga = $db->query("select count(*) as jumlahwarga from warga");
        $datawarga = $querywarga->getResultArray();
        $queryiuran = $db->query("select count(jumlah) as jumlahiuran from iuran");
        $dataiuran = $queryiuran->getResultArray();



        return view('template/content', compact('title', 'link', 'datawarga', 'dataiuran'));
    }
}