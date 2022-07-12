<?php

namespace App\Controllers;

use App\Models\IuranModel;
use CodeIgniter\Config\View;

class Iuran extends BaseController
{
    public function index()
    {
        $title = "Data Iuran Warga";
        $link = "iuran";
        $model = new IuranModel();
        $iuran = $model->findAll();

        $db      = \Config\Database::connect();
        
        return view('dataiuran', compact('iuran', 'title', 'link', 'db'));
    }

    public function __construct()
    {
        $db = db_connect();
        $this->IuranModel = new IuranModel($db);
        $this->db = db_connect();
    }
    
    //===================================================================
    //=========================AUTO COMPLETE=============================
    //===================================================================
    public function autocomplete()
	{
		$query = $this->request->getVar("query");

		$builder = $this->db->table("warga");

		$builder->select('*');
		$builder->like('nik', $query, 'both');
        $builder->orLike('namaWarga', $query, 'both');
		$query = $builder->get();
		$data = $query->getResult();

		//echo $this->db->getLastQuery();
		$namaWargacek = [];
		
		if (count($data) > 0) {

			foreach ($data as $country) {
				$namaWargacek[0] = $country->nik;
				$namaWargacek[1] = $country->namaWarga;
			}
		}
		return json_encode($namaWargacek);
	}

    public function ceknamawarga(){
        $db      = \Config\Database::connect();
        $builder = $db->table('warga');

        $builder->select('*');
        $builder->where('nik', $this->request->getVar('nik'));
        $builder->limit(10);
        $query = $builder->get();
        $datanama = $query->getResult();
        if(count($datanama) > 0){
            $namaWarga = $datanama[0]->namaWarga;
            return view('dataiuran');
        }else{
            return view('dataiuran');
        }
    }
    
    /*
    public function ajaxSearch()
    {
        helper(['form', 'url']);
        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('warga');   
        $query = $builder->like('name', $this->request->getVar('q'))
                    ->select('idWarga, namaWarga as text')
                    ->limit(10)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
    */

    //==========================================================
    //=========================ADD==============================
    //==========================================================
    public function addiuran()
    {
        $title = "Tambah Data Iuran";
        $link = "iuran/add";
        return view('addiuran', compact('title', 'link'));
    }

    public function save()
    {
        $nik = $this->request->getPost('nik');
        $tanggal = $this->request->getPost('tanggal');
        $jumlah = $this->request->getPost('jumlah');
        $keterangan = $this->request->getPost('keterangan');

        $gabungan = explode('-', $tanggal);
        $thn = $gabungan[0];
        $draftbln   = $gabungan[1];
        $drafttgl  = $gabungan[2];

        if(strlen($draftbln) == 1){
            $bln = '0'.$draftbln;
        }else{
            $bln = $draftbln;
        }

        if(strlen($drafttgl) == 1){
            $tgl = '0'.$drafttgl;
        }else{
            $tgl = $drafttgl;
        }

        
        $data = [
            'nik'    => $nik,
            'tanggal' => $tgl,
            'bulan' => $bln,
            'tahun' => $thn,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        ];
        
        $result = $this->IuranModel->add($data);
        if ($result > 0) {
            echo ('Data berhasil ditambahkan');
            return redirect()->to(base_url('/iuran'));
        } else {
            echo ('Data gagal ditambahkan');
            return redirect()->to(base_url('/iuran/add'));
        }
    }

    //==========================================================
    //=========================EDIT==============================
    //==========================================================
    public function editiuran($idIuran)
    {
        helper(['form', 'url']);

        $title = "Edit Iuran Warga";
        $link = "iuran/edit";

        $model = new IuranModel();
        $data = array(
            'iuran' => $model->find($idIuran)
        );
        
        $iuran = $model->find($idIuran);
        return view('editiuran', compact('title', 'link', 'data'));
    }

    public function updateiuran($idIuran)
    {
        helper(['form', 'url']);

        $title = "Edit Iuran Warga";
        $link = "iuran/edit";

        $IuranModel = new IuranModel();

        $validation = $this->validate([
            'idWarga' => [
                'rules' => 'required', 'readonly' => true,
                'errors' => [
                    'required' => 'ID Warga harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan harus diisi'
                ]
            ]
        ]);
        
        if(!$validation){
            $IuranModel = new IuranModel();

            return view('editiuran', [
                'iuran' => $IuranModel->find($idIuran),
                'validation' => $this->validator
            ]);
        }else{
            $tanggal = $this->request->getPost('tanggal');

            $gabungan = explode('-', $tanggal);
            $thn = $gabungan[0];
            $bln   = $gabungan[1];
            $tgl  = $gabungan[2];

            

            $IuranModel->update($idIuran, [
                'idWarga' => $this->request->getPost('idWarga'),
                'tanggal' => $tgl,
                'bulan' => $bln,
                'tahun' => $thn,
                'jumlah' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan')
            ]);

            echo ('Data berhasil diubah');
            return redirect()->to(base_url('/iuran'));
        }       
    }

    //==========================================================
    //=========================DELETE==============================
    //==========================================================
    public function deleteiuran($idIuran)
    {
        $IuranModel = new IuranModel();

        $title = "Hapus Iuran Warga";
        $link = "iuran/delete";

        $iuran = $IuranModel->find($idIuran);

        if($iuran){
            $IuranModel->delete($idIuran);
            echo ('Data berhasil dihapus');
            return redirect()->to(base_url('/iuran'));}
    }

}