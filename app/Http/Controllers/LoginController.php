<?php

namespace news_portal\Http\Controllers;

use Request;
use DB;
use Validator;
use Auth;

class LoginController extends Controller
{

    public function Logout(){
    	Auth::logout();
    	return redirect('/home');
    }

    public function FormEdit(){
    	if (Auth::Guest()) {
    		return redirect('/login');
    	}
    	return view('edit-account');
    }

    public function Edit(){
    	if (Auth::Guest()) {
    		return redirect('/login');
    	}
    	$id = Auth()->user()->id;
    	$name = Request::input('name');
    	$email = Request::input('email');
    	if (!Request::input('password') == "") {
    		$password = bcrypt(Request::input('password'));
    		DB::table('users')->where('id', $id)
    			->update(['name' => $name, 'email' => $email, 'password' => $password]);
    	}
 		DB::table('users')->where('id', $id)
    		->update(['name' => $name, 'email' => $email]);
    	return redirect('/home');
    }
}
