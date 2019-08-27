<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use View;
use DB;

class AdminPagesController extends Controller
{
    public function index(){
        $membersCount=countMembers();
        $title = 'Welcome Home';
        return view('administrator.index')->with('membersCount',$membersCount);
    }
    public function dashboard(){
        $title = 'Welcome Home';
        return view('administrator.pages.dashboard');
    }

    public function login(){
        return view('administrator.login');
    }

    public function members(){
        return view('administrator.users.members');
    }
    public function newMember(){
        $roles = Role::all();
        return view::make('administrator.users.createNewMember')->with('roles',$roles);
    }
}
