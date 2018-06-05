<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Validator;
use news_portal\News;
use news_portal\Category;
use Illuminate\Http\Request;
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
       // return json_encode($request->all());

        $user = $request->input('user');
        $category = $request->input('category');
        $title = $request->input('title');
        $date = $request->input('date');
        $notice = $request->input('notice');


		DB::insert('insert into news (users_id, category_id, title, date, notice)  values(?, ?, ?, ?, ?)',array($user, $category, $title, $date, $notice));

		return view('create-news')->with('category', Category::all());
    }

    public function list()
    {
    	return view('create-news')->with('category', Category::all());
    }

    public function view($id)
    {
    	$vn = News::find($id);
        if($vn){
            $vn->views++;
            $vn ->save();
        }
    	return view('view-news')->with('n',$vn);
    }

    public function home()
    {
        $news = News::paginate(2);
        return  view('home') -> with('news', $news);
    }


    public function SearchNews(){
       $txt = Request::input('txt');
       $news = DB::table('news')->where('notice', 'like', '%' . $txt . '%')
        ->orWhere('title', 'like', '%' . $txt . '%') ->get();
        $error = "Nenhuma notícia foi encontrada!";
        if (empty($news)) {
            return view('search-news') -> with ('news', $error);
        }
       return view('search-news') -> with ('news', $news);
    }

    public function MostAcessed(){
        $news = DB::table('news') ->orderBy('views', 'desc') ->get();
        return view('most-acessed') ->with ('news', $news);
    }
}    

