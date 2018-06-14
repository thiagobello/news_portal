<?php namespace news_portal\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Request;
use Auth;
use news_portal\News;

class PartnersController extends Controller
{
	public function partners()
	{
		$category = DB::select('select * from category');
		return view ('partner',  array('category' => $category));
	}
    
}
