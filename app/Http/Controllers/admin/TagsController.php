<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\tags;
use Validator;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tags::all();
        return view::make('administrator.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view::make('administrator.tags.create');
    }

   
    public function store(Request $request)
    {
        $rules = [
            'tag_name' => 'required'
        ];

        $validator = validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErros($validator);
        }
        else
        {
            // check for uniq category name
            $newTag = $request->input('tag_name');
            // $categ = DB::table('categories')->where('category_name',$newCateg)->count();
            $checkTag = tags::all()->where('name',$newTag);
            if (count($checkTag) > 0) {
                return redirect()->back()->with(flash_error_session('error','Tag Already Exist'));
            }
            $tag = new tags;
            $tag->name = $request->input('tag_name');       
            if ( $tag->save()) {            
                return redirect('administrator/tags')->with(flash_error_session('success','Tag created'));
            }
        }
        
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
