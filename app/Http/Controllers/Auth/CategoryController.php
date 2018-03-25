<?php namespace news_portal\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class CategoryController extends Controller;

public function categoria(){

	return view ('category');
}