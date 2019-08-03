<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Session;
use View;
use App\Product;
use App\SubCategory;
use App\product_images;
use DB;

class ProductsController extends Controller
{
    public function loadsubcategs(Request $request)
    {
        if ($request->has('categoryId'))
        {
            $categoryId = $request->categoryId;
            $subcategs = SubCategory::all()->where('category_id',$categoryId);
            foreach ($subcategs as $key => $subcateg) 
            {
                echo '<option value='.$subcateg->id.'>'.$subcateg->subcateg_name.'</option>';
            }
        } 
        else 
        {
            echo 'Not set';
        }
    }

    public function index()
    {
        $products = Product::all();
        return view('administrator.products.index')->with('products',$products);
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view::make('administrator.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_name'=> 'required',
            'regularPrice'=> 'required',
            'discountPrice'=> 'required',
            'quantity'=> 'required',
            'subcategory'=> 'nullable',
            'description'=> 'required',
            // 'image' => 'image|nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tag'=> 'required'
        ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        $tag = $request->input('tag');
        return redirect()->back()->withInput()->withErrors($validator);
    }else{
        $regular_price = $request->input('regularPrice');
        $discount_price = $request->input('discountPrice');
        // is discount<regular?
    if ($discount_price >= $regular_price) {
        return redirect()->back()->withInput()->with('error','ERROR: Discount price can not be greater than or equal to regular price');
    }else {
        try {
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->regular_price = $request->input('regularPrice');
        $product->discount_price = $request->input('discountPrice');
        $product->product_status_id = $request->input('status');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->subcateg_id = $request->input('subcategory');
        $product->qauntity = $request->input('quantity');
        if($product->save())
        {
        if($request->hasfile('image'))
        {    
            // loop through array of images
            foreach($request->file('image') as $image)
            {            
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/uploads/products_images/', $name);             
                
                $productImg = new product_images;
                $productImg->category_id = $request->input('category');
                $productImg->sub_category_id = $request->input('subcategory');
                $productImg->image = $name;
                $productImg->save();
            }
        }
        else
        {
            $productImg = new product_images;
            $fileNameToStore = 'noimage.jpg';
            $productImg->image = $fileNameToStore;
            $productImg->category_id = $request->input('category');
            $productImg->sub_category_id = $request->input('subcategory');
            $productImg->save();
        }
        return redirect()->to('/administrator/products')->with('success','New product created');  
        }      
        
    } catch (\Throwable $th) {
        $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
        return redirect()->back()->with($error);
    }

    }
    }
        // return $discount_price;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
