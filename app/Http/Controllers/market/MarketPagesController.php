<?php

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\SubCategory;
use App\Product;
use View;
use DB;

class MarketPagesController extends Controller
{

    public function index(){  
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
    
        return view('market.index')->with('products',$products); 
    }

    public function services(Request $request)
    {
        return view('market/pages.services');
    }

    public function categoryAdsOnly($id)
    {
       $products = DB::table('products as p')
       ->leftjoin('product_images as pi', function($leftjoin){
        $leftjoin->on('p.id', '=', 'pi.product_id')
        ->where('pi.id','=',DB::raw("(SELECT id FROM product_images where product_images.product_id =  p.id limit 1)"));
        }) 
       ->where('p.category_id','=',$id)
       ->select('*')->get();
       return view('market.pages.showroom')->with('products',$products); 
      
   
    }

    public function subcategoryAdsOnly($id)
    {
        $products = DB::table('products as p')
        ->leftjoin('product_images as pi', function($leftjoin){
         $leftjoin->on('p.id', '=', 'pi.product_id')
         ->where('pi.id','=',DB::raw("(SELECT id FROM product_images where product_images.product_id =  p.id limit 1)"));
         }) 
        ->where('p.subcateg_id','=',$id)
        ->select('*')->get();
       return view('market.pages.showroom')->with('products',$products); 
       
    }
   
    
}
