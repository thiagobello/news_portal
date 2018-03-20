<?php

Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::post('/noticias/criar','NewsController@create');
Route::get('/noticias','NewsController@list');




