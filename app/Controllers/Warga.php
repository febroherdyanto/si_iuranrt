<?php

namespace App\Controllers;

use App\Models\WargaModel;
use CodeIgniter\Config\View;

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

    //==========================================================
    //=========================ADD==============================
    //==========================================================
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
            return redirect()->to(base_url('/warga'));
        } else {
            echo ('Data gagal ditambahkan');
            return redirect()->to(base_url('/warga/add'));
        }
    }    

    //============================================================
    //=========================EDIT===============================
    //============================================================

    public function edit($id)
    {
        helper(['form', 'url']);

        $title = "Edit Data Warga";
        $link = "warga/edit";

        $WargaModel = new WargaModel();

        $data = array(
            'warga' => $WargaModel->find($id)
        );
        return view('editwarga', compact('data','title', 'link'));
    }

    public function update($id)
    {   
        helper(['form', 'url']);

        $WargaModel = new WargaModel();
        $title = "Edit Data Warga";
        $link = "warga/edit";
        
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

            $result = $WargaModel->update($id, $data);
            if ($result > 0) {
                echo ('Data berhasil diubah');
                return redirect()->to(base_url('/warga'));
            } else {
                echo ('Data gagal diubah');
                return redirect()->to(base_url('/warga/edit/' . $id));
            }
    }


    //==============================================================
    //=========================DELETE===============================
    //==============================================================
    public function delete($id)
    {
        $WargaModel = new WargaModel();
        $title = "Hapus Data Warga";
        $link = "warga/delete";

        $warga = $WargaModel->find($id);

        if($warga){
            $WargaModel->delete($id);
            echo ('Data berhasil dihapus');
            return redirect()->to(base_url('/warga'));
        }
    }

} //.end of class Page