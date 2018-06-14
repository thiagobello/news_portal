<?php

//Rotas de Noticias
Route::get('/home','NewsController@home');
Route::post('/noticias-criar','NewsController@create');
Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::get('/noticias','NewsController@list');
Route::get('/noticias/buscar/{txt}', 'NewsController@SearchNews');
Route::get('/noticias/pendentes', 'NewsController@NewsWaiting');
Route::get('/noticias/pendentes/{id}','NewsController@ViewWaiting')->where('id', '[0-9]+');
Route::get('/noticias/pendentes/{id}/aprovar','NewsController@ApproveNews')->where('id', '[0-9]+');
Route::post('/save-image/{id}', 'NewsController@saveImage')->where('id', '[0-9]+');
Route::get('/image/{id}', 'NewsController@getImage')->where('id', '[0-9]+');
Route::get('/mais-acessadas', 'NewsController@MostAcessed');
Route::get('/noticias-editar/{id}','NewsController@editNews')->where('id', '[0-9]+');
Route::post('/noticias-editar-salvar','NewsController@saveEditNews');


//Rotas de Categorias

Route::post('/categoria/adiciona', 'CategoryController@new');
Route::post('/categorias/adiciona', 'CategoryController@new');
Route::post('/categoria/detalhe/{id}', 'CategoryController@Details');
Route::get('/categoria/{id}','CategoryController@view')->where('id', '[0-9]+');
Route::get('/categoria', 'CategoryController@list');
Route::get('/categorias', 'CategoryController@list');
Route::get('/noticias-categoria/{id}', 'CategoryController@newsByCategory');

//Rotas de Login
Route::get('/login', 'Auth\LoginController@form');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/minha-conta', 'LoginController@MyAccount');
Route::get('/logout', 'LoginController@Logout');

//Rotas de Contato
Route::get('/contato', 'ContactController@Form');
Route::post('/contato/enviar', 'ContactController@SendContact');

Auth::routes();	