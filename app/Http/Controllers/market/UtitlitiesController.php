<?php

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Category;
use sub_category;
use DB;

class UtitlitiesController extends Controller
{
    public function navigations(){
            $menus = Category::all()->load('subcategories');
            return view('market.inc.navigation',compact('menus'));
    }
}
