<?php

namespace news_portal\Http\Controllers;

use Request;
use DB;
use Validator;
use Auth;

class LoginController extends Controller
{
      public function MyAccount(){
        //$id = auth()->user()->id;
        //$dados = DB::table('users') ->where('id', $id) ->get();
        return view('myaccount');// -> with('dados', $dados);
    }

    public function Logout(){
    	Auth::logout();
    	return redirect('/home');
    }
}
