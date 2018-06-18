@extends('layout')

@section('text')
<?php $id = Auth()->user()->id_acess_level ?>
<div class="news-align">

  <div class="col-md-8 ml-auto mr-auto">
   <?php $name = DB::table('users')->where('id', $n->users_id)->first();?>
    <center><img src="/image/{{$n->id}}" alt=""></center>
    <h3 class="title" style="text-align: left;">{{$n->title}}</h3>  
    <p style="text-align: left;">{!!$n->notice!!}</p>
    <br>
    <span>Publicado por: {{$name->name}} em: {{date('d/m/Y', strtotime($n->date))}}</span>
    <br>

    <?php if ($id== 1): ?>
          <form action="/noticias/pendentes/{{$n->id}}/aprovar">
      <button type="submit" class="btn btn-info">Aprovar</button>
    </form>
    <form action="/noticias/pendentes/{{$n->id}}/reprovar">
      <button type="submit" class="btn btn-info">Reprovar</button>
    </form>
    <?php endif ?>

<a href="/noticias-editar/{{$n->id}}"><button class="btn btn-info"> Editar </button><br></a>
	</div>

</div>



@stop
