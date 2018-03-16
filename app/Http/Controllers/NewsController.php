<?php namespace news_portal\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Validator;



class NewsController extends Controller

{
    public function list()
    {
        return view('news');
    }
}
