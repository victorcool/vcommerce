<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\SubCategory;
use DB;
use Validator;
use Redirect;
use View;
use Session;

class subCategsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   $subcategs = DB::table('sub_categories as s')
    //     ->join('categories as c', 's.category_id', '=', 'c.id')
    //     ->select('c.category_name', DB::raw("count(c.id) as count"))
    //     ->groupBy('c.id','c.category_name')
    //     ->get();
    //     dd($subcategs);

        return view('administrator.subcateg.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // categories from category tbl
        $categories = Category::all();
        return view::make('administrator.subcateg.create')->with('categories',$categories);
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
            'category' => 'required',
            'subcategory' => 'required',
            'subcategory_url' => 'required'
        ];

        # initiate validator
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            # return error and old inputs if validator fails
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            # request input data
            $subCat = $request->input('subcategory');
            $subcateg = SubCategory::all()->where('subcateg_name',$subCat);            
            if (count($subcateg) > 0) {
                // return redirect('/administrator/subcateg')->with('error','subCategory already exist');
                $error = Session::flash('error', 'Sub catgeory already exist!');
                return redirect()->back()->with($error);
            }else{            
            try{

                $subcategory = new SubCategory;
                $subcategory->subcateg_name = $request->input('subcategory');
                $subcategory->category_id = $request->input('category');
                $subcategory->status = $request->input('status');
                $subcategory->url = $request->input('subcategory_url');
                $subcategory->save();

                $success =  Session::flash('success', 'New subcategory Added');
                return redirect()->to('/administrator/subcateg')->with($success);
            }catch(\Exception $ex){
                $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$ex->getMessage());
                return redirect()->back()->with($error);
            }
        }
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
        $subcategory = SubCategory::find($id);
        return view::make('administrator.subcateg.edit')->with('subcategory',$subcategory);
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
        $rules = [
            'subcategory' => 'required',
            'category' => 'required',
            'subcategory_url' => 'required'
        ];
        $validator = validator::make($request->all(),$rules);
        if ($validator->fails()) {            
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            try {
                // let update start
                $category = SubCategory::find($id);
                $category->subcateg_name = $request->input('subcategory');
                $category->url = $request->input('subcategory_url');
                $category->save();
                return redirect()->to('/administrator/subcateg')->with('success','sub Category Updated');
            } catch (\Throwable $th) {
                $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
                return redirect()->back()->with($error);
            }
        }

        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategToDel = SubCategory::find($id);
        $subcategToDel->delete();
        $success = Session::flash('success','Subcateg Deleted successfully');
        return redirect()->back()->with($success);
        
    }
}
