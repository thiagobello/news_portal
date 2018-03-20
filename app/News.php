<?php

namespace news_portal;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;

    protected $fillable = array('users_id','category_id','title','date','notice');
}
