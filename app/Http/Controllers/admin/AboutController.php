<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use DB;
use Validator;
use Session;
use Image;
use App\Label;
use App\Utility;

class AboutController extends Controller
{
  
    public function index()
    {
        $abouts = DB::table('utilities as u')
            ->join('labels as l', 'u.label','=','l.id')
            ->select('*','u.id as uid', 'l.id as lid')            
            ->simplePaginate(10);
        return view::make('administrator.utility.index')->with('abouts',$abouts);
    }
    
    public function create()
    {
        $labels = Label::all();
        return view::make('administrator.utility.create')->with('labelsToSelect',$labels);
    }

    public function store(Request $request)
    {
        $rules = [
            'utility_title' => 'required',
            'utility_label' => 'required',
            'utilityBody' => 'required'
        ];

        if ($request->hasFile('image')) {
            //  Get filname with the Extension
            $file =  $request->file('image');
             $filenameWithExt = $request->file('image')->getClientOriginalName();
            //  Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get jus ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            Image::make($file)->resize(521,521)->save(public_path('uploads/'. $fileNameToStore)); 
         }else{
             $fileNameToStore = 'noimage.jpg';
         }

        $validator = validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            try {
                // let create start
               $AOBcode = MyuniqCode();
                $utility = new Utility;
                $utility->AOBcode = $AOBcode;
                $utility->label = $request->input('utility_label');
                $utility->body = $request->input('utilityBody');
                $utility->title = $request->input('utility_title');                
                $utility->cover_image = $request->input('image');                
                $utility->save();
                return redirect()->to('/administrator/utility')->with('success','Utility Created');
            } catch (\Throwable $th) {
                $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
                return redirect()->back()->with($error);
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $utility = Utility::findorfail($id);
        $lid = $utility->label;
        $prevLabel = Label::findorfail($lid);
        $labels = Label::all();
        return view::make('administrator.utility.edit')
        ->with(['prevLabel'=>$prevLabel,'utility'=>$utility,'labelsToSelect'=>$labels]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'utility_title' => 'required',
            'utility_label' => 'required',
            'utilityBody' => 'required'
        ];        

        $validator = validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            try {               
                $utility = Utility::findOrfail($id);                
                $utility->label = $request->input('utility_label');
                $utility->body = $request->input('utilityBody');
                $utility->title = $request->input('utility_title');                
                $utility->save();
                return redirect()->to('/administrator/utility')->with('success','Utility updated');
            } catch (\Throwable $th) {
                $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
                return redirect()->back()->with($error);
            }
        }
    }

    public function imageUpdate(Request $request, $id)
    {
        $imageId = Utility::findOrfail($id);
        $rules = [
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ( $validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // update the image 
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                // Get filename with ext
                $filenameWithExt = $image->getClientOriginalName();
                // Get just the filename
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get the extention
                $extension = $image->getClientOriginalExtension();
                // the file to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                Image::make($image)->resize(512,512)->save(public_path('uploads/'. $fileNameToStore)); 
                $imageId->cover_image = $fileNameToStore;
                $imageId->save();
                return redirect()->back()->with('success','Image updated');
            } else {
                return redirect()->back()->with('error','No image selected');
            }
            
        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('utilityId')) {
            $utilityId = $request->utilityId;
            $utilityId = Utility::find($utilityId);            
            if($utilityId->delete())
            {
                echo "deleted";
            }else{
                throw new Exception("Error Processing Request", 1);
                
            }
        }
    }
}
