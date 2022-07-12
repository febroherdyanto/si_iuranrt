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

    //===============================
    public function kas()
    {   
        $title = "Data Kas Warga";
        $link = "kas";
        return view('kas', compact('title','link'));
    }

    public function aboutsiforate()
    {
        $title = "About Siforate";
        $link = "aboutsiforate";
        return view('aboutsiforate', compact('title','link'));
    }

    public function aboutdev()
    {
        $title = "About Developer";
        $link = "aboutdev";
        return view('aboutdev', compact('title','link'));
    }

    public function thanks()
    {
        $title = "Thank You";
        $link = "thanks";
        return view('thanks', compact('title','link'));
    }

} //.end of class Page
