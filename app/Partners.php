<?php

namespace news_portal;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'partners';
    public $timestamps = false;

    protected $fillable = array('name', 'logo', 'link', 'status');

}
	    
