<?php
use Illuminate\Http\Request;
use App\Category;

if(!function_exists('flash_error_session')){
    function flash_error_session($status,$message){
       $alert = Session::flash($status,$message);
       return $alert;
    }
}

if(!function_exists('MyuniqCode')){
    function MyuniqCode($length = 6){
		$characters = '0123456789';
	   	$charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    
	    return $randomString;
	}
}
if(!function_exists('countMembers')){
	function countMembers(){
		$members = DB::table('users')
			->select('*')->count();
		return $members;
	}
}





?>