<?php

Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::post('/noticias/criar','NewsController@create');
Route::get('/noticias','NewsController@list');
Route::get('/home','NewsController@home');
<<<<<<< HEAD
Route::get('/categoria', 'CategoryController@list');
Route::post('/categoria/adiciona', 'CategoryController@new');
Route::get('/noticias/buscar/{txt}', 'NewsController@SearchNews');
=======
Route::get('/categorias', 'CategoryController@list');
Route::post('/categorias/adiciona', 'CategoryController@new');

Route::get('/login', 'Auth\LoginController@form');
Route::post('/login', 'Auth\LoginController@login');

>>>>>>> 236486211212ca573989c8e1a64b0b04826901fc
