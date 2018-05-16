<?php

Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::post('/noticias/criar','NewsController@create');
Route::get('/noticias','NewsController@list');
Route::get('/home','NewsController@home');
Route::get('/categorias', 'CategoryController@list');
Route::post('/categorias/adiciona', 'CategoryController@new');

Route::get('/login', 'Auth\LoginController@form');
Route::post('/login', 'Auth\LoginController@login');

