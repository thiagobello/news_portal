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

    	DB::table('contact')->insert(
    ['name' => $name, 'email' => $email, 'subject' => $subject, 'text' => $text, 'id_contact_box' => 1]
	);
    	$resultado = 'Seu contato foi enviado com sucesso!';
    	return view('contact')->with( 'resultado', $resultado);
    }

    public function ViewContactBox(){
        $cb = DB::select('select * from contact_box');

        return view('contact-box')->with('cb', $cb);

    }
}
