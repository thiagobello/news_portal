<?php

namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Auth;
use news_portal\News;

class UtilityController extends Controller
{
	public function viewUtility()
	{
		$utility = DB::select('select * from utility');
		return view('utility-create') -> with('utility', $utility);
	}

    public function createUtility()
    {
    	$name = Request::input('name');
    	$value = Request::input('value');
    	$date = Request::input('date');

		DB::insert('insert into utility values(null,?, ?, ?)', array($name,$value,$date));
		$utility = DB::select('select * from utility');
		return view('utility-create') -> with('utility', $utility);
    }
}
