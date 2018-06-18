<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Validator;
use news_portal\News;
use news_portal\Category;
use news_portal\Partners;
use Request;
use news_portal\Http\Requests\NewsRequest;
use Auth;
use Storage;
use File;
use Image;
use Response;


class SearchController extends Controller{


    // Procurar noticias
    public function SearchNews(){
       $txt = Request::input('txt');

       $news = News::where('notice', 'like', '%' . $txt . '%')->orWhere('title', 'like', '%' . $txt . '%')->orderByRaw('date DESC')->orderByRaw('id DESC')->paginate(2);
       return view('search-news') -> with ('news', $news);
    }
}