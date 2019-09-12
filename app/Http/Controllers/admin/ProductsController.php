<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Session;
use View;
use Image;
use App\Product;
use App\SubCategory;
use App\product_images;
use App\product_tags;
use App\tags;
use App\State;
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

    public function ProductTags(){
        $tags = tags::all();
        return $tags;
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
        $states = State::all();
        return view::make('administrator.products.create')
        ->with(['tags'=>$this->productTags(), 'states' => $states]);
    }

    public function store(Request $request)
    {
        $rules = [
            'product_name'=> 'required',
            'regularPrice'=> 'required',
            'discountPrice'=> 'required',
            'quantity'=> 'required',
            'subcategory'=> 'nullable',
            'description'=> 'required',
            'state'=> 'required',
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
            $product->states_id = $request->input('state');
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
                $last_inserted_product_id = $product->id;
            if($request->hasfile('image'))
            {    
                // loop through array of images
                foreach($request->file('image') as $image)
                {          
                    $name = $image->getClientOriginalName();
                    $filename = time().'.'.$image->getClientOriginalExtension();
                    Image::make($image)->fit(320,320,function ($constraint){
                        $constraint->upsize();
                    })
                    ->save(public_path('/uploads/products_images/'. $filename));      
                    $productImg = new product_images;
                    $productImg->product_id = $last_inserted_product_id;
                    $productImg->image = $filename;
                    $productImg->save();
                }
            }
            else
            {
                $productImg = new product_images;
                $fileNameToStore = 'noimage.jpg';
                $productImg->image = $fileNameToStore;
                $productImg->product_id = $last_inserted_product_id;
                $productImg->save();
            }
            // loop through array of tags
            foreach($request->tag as $itemTag)
            {            
                $productTag = new product_tags;
                $productTag->tag_id = $itemTag;
                $productTag->product_id = $last_inserted_product_id;
                $productTag->save();
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

    public function show($id)
    {
        return 'show';
    }

    
    public function edit($id)
    {
       $prevProduct = DB::table('products as p')
        ->leftjoin('categories as c', 'p.category_id', '=', 'c.id')
        ->leftjoin('sub_categories as s', 'p.subcateg_id', '=', 's.id')
        ->leftjoin('product_tags as pt','pt.product_id','=','p.id')
        ->leftjoin('tags as t','t.id','=','pt.tag_id')
        ->leftjoin('product_images as i','i.product_id','=','p.id')
        ->where('p.id',$id)
        ->select('*','t.name','category_name','p.description as productDescription','subcateg_name','p.id as productId','t.id as tagId','i.id as imgId')
        ->get();
        
        return view::make('administrator.products.edit')
        ->with(['tags' => $this->productTags(),'prevProduct'=>$prevProduct]);
    }

   
    public function update(Request $request,$id)
    {
        $rules = [
            'product_name'=> 'required',
            'regularPrice'=> 'required',
            'discountPrice'=> 'required',
            'quantity'=> 'required',
            'subcategory'=> 'nullable',
            'description'=> 'required',
            
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
            $product = Product::findOrfail($id);
            // $product->states_id = $request->input('state');
            $product->product_name = $request->input('product_name');
            $product->regular_price = $request->input('regularPrice');
            $product->discount_price = $request->input('discountPrice');
            $product->product_status_id = $request->input('status');
            $product->description = $request->input('description');
            $product->category_id = $request->input('category');
            $product->subcateg_id = $request->input('subcategory');
            $product->qauntity = $request->input('quantity');
            $product->save();           
             return redirect()->to('/administrator/products')->with('success','product Updated');              
        
            } catch (\Throwable $th) {
                $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
                return redirect()->back()->with($error);
            }

    }
    }
    }

  
    public function destroy(Request $request)
    {
        if ($request->has('productId')) {
            $productId = $request->productId;
            $product = Product::find($productId);            
            if($product->delete())
            {
                $image = product_images::where('product_id',$productId);
                $image->delete();
            }else{
                throw new Exception("Error Processing Request", 1);
                
            }


        }
    }
}
