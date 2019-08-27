<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Product;
use App\Setting;
use App\Service;
use App\Utility;

class PagesController extends Controller
{ 
    public function index(){
        $title = 'Home | Healmass bring you the best agricultural products';
        return view('pages.index')->with('title',$title);
    }

    public function introduction(){
        $title = 'Know who and what is healmass';
        $introductions = DB::table('utilities as u')
        ->leftjoin('labels as ts', 'ts.id', '=', 'u.label')
        ->where('ts.name','=','introduction')
        ->select('*')
        ->get();
        // lets get the teams
        $team = DB::table('users as u')
        ->leftjoin('team_socials as ts', 'ts.user', '=', 'u.id')
        ->leftjoin('user_roles as ur', 'ur.user_id', '=', 'u.id')
        ->leftjoin('roles as r', 'ur.role_id', '=', 'r.id')
        ->where('r.role_name','=','Team')
        ->select('*')
        ->get();
        return view('pages.introduction')->with([
            'title'=> $title, 'introductions' => $introductions, 'team' => $team
            ]);
    }

    public function history(){
        $title = 'Know where how far we have come';
      
         $histories = DB::table('utilities as u')
                 ->leftjoin('labels as ts', 'ts.id', '=', 'u.label')
                 ->where('ts.name','=','history')
                 ->select('*')
                 ->get();
         // lets get the teams
         $team = DB::table('users as u')
         ->leftjoin('team_socials as ts', 'ts.user', '=', 'u.id')
         ->leftjoin('user_roles as ur', 'ur.user_id', '=', 'u.id')
         ->leftjoin('roles as r', 'ur.role_id', '=', 'r.id')
         ->where('r.role_name','=','Team')
         ->select('*')
         ->get();
         return view('pages.history')->with([
             'title'=> $title, 'histories' => $histories, 'team' => $team
             ]);
    }

    public function services(){
        $title = 'Our services are outstanding';
        $services = Service::all();
        return view('pages.services', compact('title'))->with('services',$services);
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
        $settings = Setting::all();
        return view('pages.contact')->with(['title' => $title, 'settings' => $settings]);
    }

public function products()
{
    $title = 'Healmass produts';
    $products = DB::table('products as p')
    ->leftjoin('product_tags as t', 't.product_id', '=', 'p.id')
    ->leftjoin('tags as ts', 'ts.id', '=', 't.tag_id')
    ->leftjoin('product_images as pi', function($leftjoin){
    $leftjoin->on('p.id', '=', 'pi.product_id')
    ->where('pi.id','=',DB::raw("(SELECT id FROM product_images where product_images.product_id =  p.id limit 1)"));
    })  
    ->where('ts.name','=','healmass')
    ->select('*','ts.name as tagName')         
    ->get();

    return view('pages.products')->with('products',$products);
}
    // public function products(){
    //     $title = 'Healmass produts';
    //     $products = DB::table('products as p')
    //         ->leftjoin('product_tags as t', 't.product_id', '=', 'p.id')
    //         ->leftjoin('tags as ts', 'ts.id', '=', 't.tag_id')
    //         ->leftjoin('product_images as pi', 'pi.product_id', '=', 'p.id')
    //         ->where('ts.name','=','healmass')
    //         ->select('*','ts.name as tagName')
    //         ->get();
            
    //     return view('pages.products')->with('products',$products);
    // }

   
}
