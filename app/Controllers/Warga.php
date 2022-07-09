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

        $validation = $this->validate([
            'nik' => [
                'rules' => 'required|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong'
                ]
            ],
            'namaWarga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Warga tidak boleh kosong'
                ]
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelamin tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong'
                ]
            ],
            'noRumah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Rumah tidak boleh kosong'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong'
                ]
            ]
        ]);

        if(!$validation){
            $WargaModel = new WargaModel();

            return view('editwarga', [
                'warga' => $WargaModel->find($id),
                'validation' => $this->validator
            ]);
        }else{
            $WargaModel = new WargaModel();

            $WargaModel->update($id, [
                'nik' => $this->request->getPost('nik'),
                'namaWarga' => $this->request->getPost('namaWarga'),
                'kelamin' => $this->request->getPost('kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'noRumah' => $this->request->getPost('noRumah'),
                'status' => $this->request->getPost('status')
            ]);

            echo ('Data berhasil diubah');
            return redirect()->to(base_url('/warga'));
        }
    }


    //==============================================================
    //=========================DELETE===============================
    //==============================================================
    public function delete($id)
    {
        $WargaModel = new WargaModel();

        $warga = $WargaModel->find($id);

        if($warga){
            $WargaModel->delete($id);
            echo ('Data berhasil dihapus');
            return redirect()->to(base_url('/warga'));
        }
    }

} //.end of class Page