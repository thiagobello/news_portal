<?php

namespace news_portal\Http\Controllers;

use Request;
use DB;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function MyAccount(){
 		if (Auth::Guest()) {
 			return redirect ('home');
 		}
        return redirect('/home');
    }

    public function Logout(){
    	Auth::logout();
    	return redirect('/home');
    }
}
