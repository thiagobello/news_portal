<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Auth;
use news_portal\News;

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
		$name = Request::input('category_m');

		DB::insert('insert into category values(null, ?)', array($name));

		return view('category-new') -> with('name', $name);

	}

	public function Details(Request $request, $id){
		$category = Category::find($id);
		return view('category-details') ->with('category', $category);

	}

	public function newsByCategory($id)
	{
		$news = News::where('status', '1')->where('category_id', $id)->paginate(2);
		$category = DB::select('select * from category');
		return  view('home', array('news' => $news,'category' => $category));
	}

    public function view($id)
    {
    	$category = Category::find($id);
    	return view('home')->with('c',$category);
    }
}	