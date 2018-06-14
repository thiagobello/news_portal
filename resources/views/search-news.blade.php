@extends('layout')

@section('text')

@foreach($news as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <figure class="article-image is-16by9">
        <img src="/image/{{$n->id}}" alt="">
      </figure>
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
@endforeach
    

@stop
