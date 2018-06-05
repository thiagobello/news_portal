<?php

namespace news_portal;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'Contact';
    public $timestamps = false;

    protected $fillable = array('name', 'email', 'subject', 'text');

}
	    
