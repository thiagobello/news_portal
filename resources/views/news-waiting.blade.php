@extends('layout')

@section('text')

	@foreach($news as $n)
    <a class="article" href="/noticias/pendentes/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{{$n->notice}}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>

    </a>
  @endforeach
  @if($news->hasMorePages())
        <li><a href="{{ $news->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li class="disabled"><span>&raquo;</span></li>
    @endif

@stop
