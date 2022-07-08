<?php 

namespace App\Controllers;

class Page extends BaseController
{
    public function dashboard()
    {
        $title = "Dashboard";
        $link = "dashboard";
        return view('dashboard', compact('title','link'));
    }

    // Function Login
    public function login()
    {
        return view('login');
    }

    //Function Register
    public function register()
    {
        return view('register');
    }

} //.end of class Page
