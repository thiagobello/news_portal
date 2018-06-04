<?php

namespace news_portal\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Form(){
    	return view('contact');
    }
}
