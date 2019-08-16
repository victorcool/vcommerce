<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use DB;
use App\Label;

class AboutController extends Controller
{
  
    public function index()
    {
        $abouts = DB::table('utilities as u')
            ->join('labels as l', 'u.label','=','l.id')
            ->select('*')
            ->get();
        return view::make('administrator.about.index')->with('abouts',$abouts);
    }
    
    public function create()
    {
        $labels = Label::all();
        return view::make('administrator.about.create')->with('labelsToSelect',$labels);
    }

    public function store(Request $request)
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
                // let update start
                $utility = new Utility;
                $utility->AOBcode = $request->$c;
                $utility->label = $request->input('utility_label');
                $utility->body = $request->input('utilityBody');
                $utility->title = $request->input('utility_title');                
                $utility->save();
                return redirect()->to('administrator.about.index')->with('success','utility Created');
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
