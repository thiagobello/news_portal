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
    		$password = bcrypt(Request::input('password'));
    		DB::table('users')->where('id', $id)
    			->update(['name' => $name, 'email' => $email, 'password' => $password]);
 		DB::table('users')->where('id', $id)
    		->update(['name' => $name, 'email' => $email]);
    	return redirect('/home');
    }
 

    public function Form(){
        if (Auth::Guest()) {
            return redirect('/login');
        }
        $id = Auth()->user()->id_acess_level;
       if ($id == 1) {
            $access_level = DB::table('access_level')->get();
            return view('users')->with('access_level', $access_level);
        }
        return redirect('/login');


    }

    public function NewUser(){
        if (Auth()->user()->id_acess_level != 1) {
            return redirect('/login');
        }

        $name = Request::input('name');
        $email = Request::input('email');
        $id_acess_level = Request::input('id_acess');
        $password = bcrypt(Request::input('password'));
        DB::table('users')->insert(['name' => $name, 'email' => $email, 'id_acess_level' => $id_acess_level, 'password' => $password]);
        return redirect('/criar-usuario');
    }

    public function EditUser($id){
        if (Auth()->user()->id_acess_level != 1) {
            return redirect('/home');
        }

        $user = db::table('users')->where('id', $id)-> get();
        return view('edituser')->with('user', $user);
    }

    public function ResetPassword($id){
         if (Auth()->user()->id_acess_level != 1) {
            return redirect('/home');
        }

        $password = bcrypt('123123');
        DB::table('users')->where('id', $id)->update(['password' => $password]);

        return redirect('/usuarios');
    }
}    
