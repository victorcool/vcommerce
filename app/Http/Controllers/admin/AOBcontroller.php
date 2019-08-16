<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\Service;
use Validator;
use DB;
use Redirect;
use Session;
use Image;

class AOBcontroller extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view::make('administrator.services.index')->with('services',$services);
    }

    public function create()
    {
       return view::make('administrator.services.create');
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'service_name'=> 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=> 'required',
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
            Image::make($file)->resize(320,320)->save(public_path('/uploads/services_images/'. $fileNameToStore)); 
         }else{
             $fileNameToStore = 'noimage.jpg';
         }
         $validator = Validator::make($request->all(), $rules);
         if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
         }else{
            $serviceName = $request->input('service_name');
            $services = Service::all()->where('title',$serviceName);
            if (count($services) > 0) {
                return redirect()->back()->with(flash_error_session('error','Service Already Exist'));
            }else{
                try {
                    $service = new Service;
                    $service->title = $request->input('service_name');
                    $service->description = $request->input('description');
                    $service->icon = $fileNameToStore;
                    $service->save();
                    return redirect('/administrator/services')->with('success','New service Added');
                } catch (\Throwable $th) {
                    $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
                    return redirect()->back()->with($error);
                }
            }
        }
    }
        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view::make('administrator.services.edit')->with('service', $service);
    }

    public function update(Request $request, $id)
    {
       $serviceId = Service::findOrfail($id);
       $rules = [
        'description' => 'required',
        'service_name' => 'required|max:30',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ( $validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // check if the name exist
            $name = $request->input('service_name');
            if(count($checkServiceNameExistence = Service::all()->where('title',$name)) > 0){
                return redirect()->to('/administrator/services')->with('success','Data remains thesame');
            }else{
                try {
                    $newServiceName = Service::findOrfail($id);
                    $newServiceName->title = $request->input('service_name');
                    $newServiceName->description = $request->input('description');
                    $newServiceName->save();
                    return redirect()->to('/administrator/services')->with('success','Service updated');
                } catch (\Throwable $th) {
                    $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$th->getMessage());
                    return redirect()->back()->with($error);
                }
            }
        }
        
    }

    public function updateServiceImg(Request $request, $id)
    {
        $serviceId = Service::findOrfail($id);
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
                Image::make($image)->resize(200,200)->save(public_path('/uploads/services_images/'. $fileNameToStore)); 
                $serviceId->icon = $fileNameToStore;
                $serviceId->save();
                return redirect()->back()->with('success','Image updated');
            } else {
                return redirect()->back()->with('error','No image selected');
            }
            
        }
        
        
    }
}
