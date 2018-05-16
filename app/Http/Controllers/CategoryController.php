<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class CategoryController extends Controller
{
	public function list()
	{
		$category = DB::select('select * from category');
		return view('category') -> with('category', $category);
	}

	public function new()
	{
		$name = Request::input('name');

		DB::insert('insert into category values(null, ?)', array($name));

		return view('category-new') -> with('name', $name);

	}

}	