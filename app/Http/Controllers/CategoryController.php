<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Auth;
use news_portal\News;
use news_portal\Category;

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
		$category = DB::select('select * from category');
		return view('category') -> with('category', $category);

	}

	public function Details(Request $request, $id){
		$category = Category::find($id);
		return view('category-details') ->with('category', $category);

	}

	public function newsByCategory($id)
	{
		$news = News::where('status', 'A')->where('category_id', $id)->orderByRaw('date DESC')->orderByRaw('id DESC')->paginate(2);
		$category = DB::select('select * from category');
		return  view('news-by-category', array('news' => $news,'category' => $category));
	}

    public function view($id)
    {
    	$category = Category::find($id);
    	return view('home')->with('c',$category);
    }

     public function editCategory($id)
    {
        $edit = Category::find($id);
        $category = DB::select('select * from category');
        return view('edit-category', array('category' => $category,'edit' => $edit));
    }

    public function saveEditCategory($id)
    {
		$name = Request::input('categorys');
        DB::table('category')->where('id',$id)->update(array('name'=>$name));

        $category = DB::select('select * from category');
       	return view('category') -> with('category', $category);
    }

    public function deleteCategory($id)
    {
		DB::table('category')->where('id',$id)->delete();

        $category = DB::select('select * from category');
       	return view('category') -> with('category', $category);
    }
}	