<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	return view('pages.Home');
    }
    public function show_test(){
    	return view('pages.test');
    }
}


