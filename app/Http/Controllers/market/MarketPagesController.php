<?php

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\SubCategory;
use View;
use DB;

class MarketPagesController extends Controller
{

    public function index(){                            
        return view('market.index');
    }

    public function services(Request $request)
    {
        return view('market/pages.services');
    }

    public function showroom($id)
    {
       $items = SubCategory::find($id);
        return view::make('market/pages.showroom')->with('items',$items);
    }
}
