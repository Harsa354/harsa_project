<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.index');

    }

    public function about(){
        return view('about.index');
    }

    public function where(){
        return 'pucek';
    }
    
    public function content(){
        return view('content.index') ;
    }
    
}
