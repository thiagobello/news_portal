@extends('layout')

@section('text')
<?php $name = DB::table('users')->where('id', $n->users_id)->first();?>
<div class="news-align">

	<div class="col-md-8 ml-auto mr-auto">
		
      	<center><img src="/image/{{$n->id}}" alt=""></center>
      	<h3 class="title" style="text-align: left;">{{$n->title}}</h3>	
		<p style="text-align: left;">{!!$n->notice!!}</p>
		<br>
		<span>Publicado por: {{$name->name}} em: {{date('d/m/Y', strtotime($n->date))}}</span>
	</div>

<?php if (Auth::Check()): $id = Auth()->user()->id_acess_level;?>
	<?php if ($id == 1): ?>
		<a href="/noticias-editar/{{$n->id}}"><button class="btn btn-info"> Editar </button><br></a>
	<?php endif ?>
	<?php if (!$id == 1): ?>
		<?php if ($n->status != 'A'): ?>
			<a href="/noticias-editar/{{$n->id}}"><button class="btn btn-info"> Editar </button><br></a>
		<?php endif ?>
	<?php endif ?>
<?php endif ?>
</div>



@stop
