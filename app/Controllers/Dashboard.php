<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController{
    public function index(){
        $session = session();
        echo "Welcome Back - ".$session->get('user_name');
    }
}