<?php

Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::post('/noticias/criar','NewsController@create');
Route::get('/noticias','NewsController@list');
Route::get('/home','NewsController@home');
Route::get('/categoria', 'CategoryController@list');
Route::post('/categoria/adiciona', 'CategoryController@new');

