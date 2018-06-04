@extends('layout')

@section('text')


<h1> Seja bem-vindo <?php $name = auth()->user()->name ?> {{$name}} !<br>
Seu e-mail é: <?php $email = auth()->user()->email ?> {{$email}} ! <br>
Noticias pendentes de aprovação:
 <a href='/noticias/pendentes/'> 
	<?php 
		$qtd = DB::table('news')->where('status', '0') ->count();
	 ?> 
	 {{$qtd}} <br>
</a>
<a href='/logout'>
	Sair
</a>



</h1>


@stop
