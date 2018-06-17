<?php

//Rotas de Noticias
Route::get('/home','NewsController@home');
Route::post('/noticias-criar','NewsController@create');
Route::get('/noticias/{id}','NewsController@view')->where('id', '[0-9]+');
Route::get('/noticias','NewsController@list');
Route::get('/noticias/buscar/{txt}', 'NewsController@SearchNews');
Route::get('/noticias/pendentes', 'NewsController@NewsWaiting');
Route::get('/noticias/pendentes/{id}','NewsController@View')->where('id', '[0-9]+');
Route::get('/noticias/pendentes/{id}/aprovar','NewsController@ApproveNews')->where('id', '[0-9]+');
Route::get('/noticias/pendentes/{id}/reprovar','NewsController@ReproveNews')->where('id', '[0-9]+');
Route::post('/save-image/{id}', 'NewsController@saveImage')->where('id', '[0-9]+');
Route::get('/image/{id}', 'NewsController@getImage')->where('id', '[0-9]+');
Route::get('/mais-acessadas', 'NewsController@MostAcessed');
Route::get('/noticias-editar/{id}','NewsController@editNews')->where('id', '[0-9]+');
Route::post('/noticias-editar-salvar','NewsController@saveEditNews');
Route::get('/minhas-noticias', 'NewsController@MyNews');

//Rotas de Categorias
Route::post('/categoria/adiciona', 'CategoryController@new');
Route::post('/categorias/adiciona', 'CategoryController@new');
Route::post('/categoria/detalhe/{id}', 'CategoryController@Details');
Route::get('/categoria/{id}','CategoryController@view')->where('id', '[0-9]+');
Route::get('/categoria', 'CategoryController@list');
Route::get('/categorias', 'CategoryController@list');
Route::get('/noticias-categoria/{id}', 'CategoryController@newsByCategory');

//Rotas de Login
Auth::routes();	
Route::get('/login', 'Auth\LoginController@form');
Route::post('/login/entrar', 'Auth\LoginController@login');
Route::get('/logout', 'LoginController@Logout');
Route::get('/minha-conta', 'LoginController@FormEdit');
Route::post('/minha-conta/alterar','LoginController@Edit');


//Rotas de Contato
Route::get('/contato', 'ContactController@Form');
Route::post('/contato/enviar', 'ContactController@SendContact');
Route::get('/caixa-mensagens', 'ContactController@ViewContactBox');

//Rotas de Parceiros
Route::get('/parceiros', 'PartnersController@partners');
Route::post('/parceiros-salvar', 'PartnersController@partnersCreate');
Route::post('/partner-image/{id}', 'PartnersController@saveImage')->where('id', '[0-9]+');
Route::get('/partner/{id}', 'PartnersController@getImageP')->where('id', '[0-9]+');

//Utilidades
Route::get('/utilidades', 'UtilityController@viewUtility');
Route::post('/utilidades-criar', 'UtilityController@createUtility');




