<?php
use Illuminate\Http\Request;
use App\Category;

if(!function_exists('flash_error_session')){
    function flash_error_session($status,$message){
       $alert = Session::flash($status,$message);
       return $alert;
    }
}



?>