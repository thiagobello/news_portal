@extends('layout')

@section('text')

  @foreach($news as $n)
    <a class="article" href="/noticias/pendentes/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach

  <nav aria-label="..." style="font-color: #1B2442">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="{{ $news->previousPageUrl()}} ">Voltar</a>
      </li>    
      <li class="page-item">
        <a class="page-link" href="{{ $news->nextPageUrl() }}">Próxima</a>
      </li>
    </ul>
  </nav>
@stop

