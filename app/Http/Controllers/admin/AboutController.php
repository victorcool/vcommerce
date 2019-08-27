<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use DB;
use Validator;
use Session;
use App\Label;
use App\Utility;

class AboutController extends Controller
{
  
    public function index()
    {
        $abouts = DB::table('utilities as u')
            ->join('labels as l', 'u.label','=','l.id')
            ->select('*','u.id as uid')            
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
        //
    }

    public function update(Request $request, $id)
    {
        //
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
