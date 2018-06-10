<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Auth;

class CategoryController extends Controller
{
	public function categoria(){

		return view ('category');
	}

	public function list()
	{
		if (Auth::Guest()) 
		{
			return redirect('/login');
		}
		$category = DB::select('select * from category');
		return view('category') -> with('category', $category);
	}

	public function new()
	{
		$name = Request::input('name');

		DB::insert('insert into category values(null, ?)', array($name));

		return view('category-new') -> with('name', $name);

	}

	public function Details(Request $request, $id){
		$category = Category::find($id);
		return view('category-details') ->with('category', $category);

	}

}	