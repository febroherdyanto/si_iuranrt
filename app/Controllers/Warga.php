<?php

namespace App\Controllers;

use App\Models\WargaModel;

class Warga extends BaseController
{
    public function index()
    {
        $title = "Data Warga";
        $link = "warga";
        $model = new WargaModel();
        $warga = $model->findAll();
        
        return view('datawarga', compact('warga', 'title', 'link'));
    }

    public function __construct()
    {
        $db = db_connect();
        $this->WargaModel = new WargaModel($db);
    }

    public function addwarga()
    {
        $title = "Tambah Data Warga";
        $link = "warga/add";
        return view('addwarga', compact('title', 'link'));
    }

} //.end of class Page