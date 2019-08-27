<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use View;
use Validator;
use Image;
use Session;
use App\Role;
use App\User;
use App\user_roles;
use App\TeamSocial;

class UsersController extends Controller
{
  
    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        
        # define validation rules
        $rules = [
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
        // lets check for image/file
        if ($request->hasFile('cover_img')) {
            //  Get filname with the Extension
            $file =  $request->file('cover_img');
             $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
            //  Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get jus ext
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            Image::make($file)->resize(250,250)->save(public_path('/uploads/profile/'. $fileNameToStore)); 
         }else{
             $fileNameToStore = 'noimage.jpg';
         }

        # initiate validator
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            # return error and old inputs if validator fails
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            // lets check if new admin or member
            $roleName = $request->input('role');
            $role = Role::all()->where('role_name', $roleName);
              foreach ($role as $key => $value);
                $roleId = $value->id;
            if ($roleName == 'Member') {  
                try{
                    $user = new User;
                    $user->name = $request->input('fullname');
                    $user->email = $request->input('email');
                    $user->password = Hash::make($request->input('password'));
                    $user->phoneNumber = $request->input('phone');
                    $user->cover_img = $fileNameToStore;
                    if($user->save()){
                        $userRole = new user_roles;
                        // getting the last inserted id of the user
                        $userRole->user_id = $user->id;
                        $userRole->role_id = $roleId;
                        $userRole->save();
                    }   
                    $success =  Session::flash('success', 'New user Added');
                    return redirect()->back()->with($success);
                }
                catch(\Exception $ex)
                {
                    $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$ex->getMessage());
                    return redirect()->back()->with($error);
                }
            } else {               
               try{
                $user = new User;
                $user->name = $request->input('fullname');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->phoneNumber = $request->input('phone');
                $user->cover_img = $fileNameToStore;
                if($user->save()){
                    $userRole = new user_roles;
                    // getting the last inserted id of the user
                    $userRole->user_id = $user->id;
                    $userRole->role_id = $roleId;
                    $userRole->save();
                    // for saving the team_contact
                    $social = new TeamSocial;
                    // getting the last inserted id of the user
                    $social->user = $user->id;
                    $social->position = $request->input('position');
                    $social->facebook = $request->input('facebook');
                    $social->twitter = $request->input('twitter');
                    $social->linkedin = $request->input('linkedin');
                    $social->instagram = $request->input('instagram');
                    $social->save();
                }   
                $success =  Session::flash('success', 'New user Added');
                return redirect()->back()->with($success);
            }
            catch(\Exception $ex)
            {
                $error =  Session::flash('error', 'Sorry, operation could not be completed.'.$ex->getMessage());
                return redirect()->back()->with($error);
            }
            }
            
                      
  
        
        }
    }
}
