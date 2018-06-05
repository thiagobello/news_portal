<?php
Route::post('/noticias-criar','NewsController@create');

Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::get('/noticias','NewsController@list');
Route::get('/home','NewsController@home');
Route::get('/categoria', 'CategoryController@list');
Route::post('/categoria/adiciona', 'CategoryController@new');
Route::get('/noticias/buscar/{txt}', 'NewsController@SearchNews');
Route::get('/categorias', 'CategoryController@list');
Route::post('/categorias/adiciona', 'CategoryController@new');
Route::get('/login', 'Auth\LoginController@form');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/mais-acessadas', 'NewsController@MostAcessed');
Route::post('/categoria/detalhe/{id}', 'CategoryController@Details');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
