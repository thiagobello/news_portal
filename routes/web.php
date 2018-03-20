<?php

Route::get('/noticias','NewsController@list');
Route::post('/noticias/criar','NewsController@create');


