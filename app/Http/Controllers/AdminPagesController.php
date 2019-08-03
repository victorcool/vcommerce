<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index(){
        $title = 'Welcome Home';
        return view('administrator.index');
    }
    public function dashboard(){
        $title = 'Welcome Home';
        return view('administrator.pages.dashboard');
    }

    public function login(){
        return view('administrator.login');
    }
}
