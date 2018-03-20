<?php namespace news_portal\Http\Controllers;

use Request;
use DB;
use Validator;
use news_portal\News;
use news_portal\Http\Requests\NewsRequest;



class NewsController extends Controller

{
    public function create(NewsRequest $request)
    {
		News::create($request->all());
        return view('news');
    }

    public function list()
    {
    	return view('news');
    }
}
