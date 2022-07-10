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
		$builder->like('idWarga', $query, 'both');
		$query = $builder->get();
		$data = $query->getResult();

		//echo $this->db->getLastQuery();
		$namaWargacek = [];
		
		if (count($data) > 0) {

			foreach ($data as $country) {
				$namaWargacek[0] = $country->idWarga;
				$namaWargacek[1] = $country->namaWarga;
			}
		}
		return json_encode($namaWargacek);
	}

    public function ceknamawarga(){
        $db      = \Config\Database::connect();
        $builder = $db->table('warga');

        $builder->select('*');
        $builder->where('idWarga', $this->request->getVar('idWarga'));
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
        $idWarga = $this->request->getPost('idWarga');
        $tanggal = $this->request->getPost('tanggal');
        $jumlah = $this->request->getPost('jumlah');
        $keterangan = $this->request->getPost('keterangan');

        $gabungan = explode('-', $tanggal);
        $thn = $gabungan[0];
        $bln   = $gabungan[1];
        $tgl  = $gabungan[2];
        
        $data = [
            'idWarga'    => $idWarga,
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

}