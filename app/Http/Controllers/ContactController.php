<?php

namespace news_portal\Http\Controllers;

use Auth;
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
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/y');

    	DB::table('contact')->insert(
    ['name' => $name, 'email' => $email, 'subject' => $subject, 'text' => $text, 'id_contact_box' => 1, 'date' => $date]
	);
    	$resultado = 'Seu contato foi enviado com sucesso!';
    	return view('contact')->with( 'resultado', $resultado);
    }

    public function ContactBox(){
        if (Auth::user()->id_acess_level ==1) {
         
        
        $cb = DB::select('select * from contact_box');

        return view('contact-box')->with('cb', $cb);
        }
        return redirect('/login');
    }

    public function ViewContact($id){
        if (Auth::user()->id_acess_level == 1) {
            
        
        $ctt = db::table('contact')->where('id', $id)->get();
        db::table('contact')->where('id',$id)->update(['id_contact_box' => 2]);

        return view('viewcontact')->with('ctt', $ctt);
        }

        return redirect('/login');
    }

    public function Arquivar($id){
        if (Auth::user()->id_acess_level == 1) {
            db::table('contact')->where('id',$id)->update(['id_contact_box' => 3]);
            return redirect('/caixa-mensagens');
        }
        return redirect('/login');

    }

    public function Delete($id){
        if (Auth::user()->id_acess_level ==1) {
            db::table('contact')->where('id', $id)->delete();
            return redirect('/caixa-mensagens');
        }
        return redirect('/login');
    }
}
