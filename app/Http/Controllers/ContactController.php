<?php

namespace news_portal\Http\Controllers;

use Request;
use DB;

class ContactController extends Controller
{
    public function Form(){
    	return view('contact');
    }

    public function SendContact(){

    	$name = Request::input('name');
    	$email = Request::input('email');
    	$subject = Request::input('subject');
    	$text = Request::input('text');
    	//$date = DB::select('select sysdate()');

    	DB::table('contact')->insert(
    ['name' => $name, 'email' => $email, 'subject' => $subject, 'text' => $text]
	);
    	




    	//DB::insert('insert into contact values(null, ?, ?, null, ?, ?);')
    	//	-> array($name, $email, $subject, $text);

    	return redirect('/home');	
    }
}
