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

    public function save()
    {
        $nik = $this->request->getPost('nik');
        $namaWarga = $this->request->getPost('namaWarga');
        $kelamin = $this->request->getPost('kelamin');
        $alamat = $this->request->getPost('alamat');
        $noRumah = $this->request->getPost('noRumah');
        $status = $this->request->getPost('status');

        $data = [
            'nik'    => $nik,
            'namaWarga' => $namaWarga,
            'kelamin' => $kelamin,
            'alamat' => $alamat,
            'noRumah' => $noRumah,
            'status' => $status
        ];

        $result = $this->WargaModel->add($data);
        if ($result > 0) {
            echo ('Data berhasil ditambahkan');
            return redirect()->to('/warga');
        } else {
            echo ('Data gagal ditambahkan');
            return redirect()->to('/warga/add');
        }
    }

} //.end of class Page