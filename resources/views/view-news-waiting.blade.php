@extends('layout')

@section('text')
<div class="news-align">

  <div class="col-md-8 ml-auto mr-auto">

    <center><img src="/image/{{$n->id}}" alt=""></center>
    <h3 class="title" style="text-align: left;">{{$n->title}}</h3>  
    <p style="text-align: left;">{!!$n->notice!!}</p>
    <br>
    <span>{{date('d/m/Y', strtotime($n->date))}}</span>

    <form action="/noticias/pendentes/{{$n->id}}/aprovar">
      <button type="submit" class="btn btn-info">Aprovar</button>
    </form>
    <form action="/noticias/pendentes/{{$n->id}}/reprovar">
      <button type="submit" class="btn btn-info">Reprovar</button>
    </form>

	</div>

</div>



@stop
