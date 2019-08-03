<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{ 
    public function index(){
        $title = 'Home | Healmass bring you the best agricultural products';
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $title = 'Know who and what is healmass';
        return view('pages.about')->with('title',$title);
    }

    public function services(){
        $title = 'Our services are outstanding';

        return view('pages.services', compact('title'));
    }

    public function login(){
        $title = 'LOGIN FORM';
        return view('pages.login')->with('title',$title);
    }

    public function register(){
        $title = 'REGISTER HERE';
        return view('pages.register')->with('title',$title);
    }

    public function contact(){
        $title = 'We are always here for you 24/7';
        return view('pages.contact')->with('title',$title);
    }

    public function products(){
        $title = 'Healmass produts';
        return view('pages.products');
    }

   
}
