<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use View;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membersCount=countMembers();
        $title = 'Welcome Home';
        return view('administrator.index')->with('membersCount',$membersCount);
        
    }

        /**
     * Show the application user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('pages.profile');
    }

    public function members(){
        return view('administrator.users.members');
    }
    public function newMember(){
        $roles = Role::all();
        return view::make('administrator.users.createNewMember')->with('roles',$roles);
    }
}
