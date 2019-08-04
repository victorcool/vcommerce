<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Validator;
use Redirect;
use View;
use Session;


class CategoriesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function parent_id($length = 6){
		$characters = '0123456789';
	   	$charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }	    
	    return $randomString;
    }
   
    public function index()
    {
       
        $categories = Category::orderBy('created_at','desc')->simplePaginate(10);        
        return view('administrator.categories.index')->with('categories', $categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          # define validation rules
          $rules = [
            'category_name' => 'required',
            'description' => 'required'
        ];

        # initiate validator
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){

            # return error and old inputs if validator fails
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
        // check for uniq category name
        $newCateg = $request->input('category_name');
        // $categ = DB::table('categories')->where('category_name',$newCateg)->count();
        $categ = Category::all()->where('category_name',$newCateg);
        if (count($categ) > 0) {
            return redirect()->back()->with(flash_error_session('error','Category Already Exist'));
        }

        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->description = $request->input('description');
        $category->url = $request->input('category_url');
        $category->save();
        return redirect('/administrator/categories')->with('success','New category Added');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('administrator.categories.edit')->with('categoryToEdit',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'description' => 'required'
        ]);

        // let update start
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/administrator/categories')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);        
        if ($category->delete()) {
            return redirect()->back()->with('success','Categeory Removed successfully');
        }
    }
}
