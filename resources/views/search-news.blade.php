@extends('layout')

@section('text')

	@foreach($news as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <figure class="article-image is-16by9">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/image-04-lo.jpg" alt="">
      </figure>
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{{$n->notice}}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>42 comments</span>
        </footer>
      </div>
    </a>
  @endforeach

@stop
