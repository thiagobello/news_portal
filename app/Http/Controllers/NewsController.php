<?php namespace news_portal\Http\Controllers;

use Request;
use DB;
use Validator;
use news_portal\News;
use news_portal\Category;
use news_portal\Http\Requests\NewsRequest;



class NewsController extends Controller

{
 /*   public function _construct()
    {
        $this->middleware('Authorizer');        
    }
*/
    public function create(NewsRequest $request)
    {
		News::create($request->all());
		return view('create-news')->with('category', Category::all());
    }

    public function list()
    {
    	return view('create-news')->with('category', Category::all());
    }

    public function view($id)
    {
    	$vn = News::find($id);
    	return view('view-news')->with('n',$vn);
    }

    public function home()
    {
        $news = News::paginate(2);
        return  view('home') -> with('news', $news);
    }

}
