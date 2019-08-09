<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use view;
use App\Setting;
use DB;
use Validator;
use Redirect;
use Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view::make('administrator.configurations.index')->with('settings',$settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $rules = [
            'first_email' => 'required',
            'first_number' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'site_title' => 'required'
        ];

        $validator = validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            try {
                // let update start
                $setting = Setting::find($id);
                $setting->title = $request->input('site_title');
                $setting->email1 = $request->input('first_email');
                $setting->email2 = $request->input('second_email');
                $setting->phone1 = $request->input('first_number');
                $setting->phone2 = $request->input('second_number');
                $setting->facebook = $request->input('facebook');
                $setting->instagram = $request->input('instagram');
                $setting->twitter = $request->input('twitter');
                $setting->address = $request->input('address');
                $setting->save();
                return redirect()->back()->with('success','Settings Updated');
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
        //
    }
}
