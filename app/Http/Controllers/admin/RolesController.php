<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Session;
use View;
use App\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view::make('administrator.UserRoles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view::make('administrator.UserRoles.create');
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
            'role_name' => 'required'
        ];

        $validator = validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErros($validator);
        }
        else
        {
            // check for uniq role name
            $newRole = $request->input('role_name');
            // $categ = DB::table('categories')->where('role_name',$newCateg)->count();
            $checkTag = Role::all()->where('role_name',$newRole);
            if (count($checkTag) > 0) {
                return redirect()->back()->with(flash_error_session('error','Tag Already Exist'));
            }
            $role = new Role;
            $role->role_name = $request->input('role_name');       
            if ( $role->save()) {            
                return redirect('administrator/UserRoles')->with(flash_error_session('success','Role created'));
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
        $role = Role::findOrfail($id);
        return view::make('administrator.UserRoles.edit')->with('role',$role);
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
            'role_name' => 'required'
        ];

        $validator = validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErros($validator);
        }
        else
        {
            try {
                 // let update start
                $role = Role::find($id);
                $role->role_name = $request->input('role_name');
                $role->save();
                return redirect('/administrator/UserRoles')->with('success','role Updated');
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
    public function destroy(Request $request)
    {
        if ($request->has('roleId')) {
            $roleId = $request->roleId;
            $roleId = Role::find($roleId);            
            if($roleId->delete())
            {
                echo "deleted";
            }else{
                throw new Exception("Error Processing Request", 1);
                
            }
        }
    }
}
