<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use View;

class AdminLoginController extends Controller
{
    public function __construct(){
       $this->middleware('guest:admin',['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('administrator.login');
    }

    public function login(Request $request){
        //    validate the form data
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
        // attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
             // if successful redirect user to the intended location
            return redirect()->intended(route('admin.dashboard'));
        }else{
             // if unseccessful redirect back to login page with form data
            return redirect()->back()->withInput($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
}
