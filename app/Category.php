<?php

namespace news_portal;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table='category';
	public $timestamps = false;


	public function news()
    {
    	return $this->hasMany('\news_portal\News');
    }
  
}
