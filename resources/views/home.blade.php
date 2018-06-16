 @extends('layout')

@section('text')

<main class="main columns">
  <section class="column">


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

    @if($news->hasMorePages())
        <li><a href="{{ $news->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li class="disabled"><span>&raquo;</span></li>
    @endif
  </section>
    

	<section class="column-right">

    <div id="demo" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active" >
              <a target="_blank" href="https://esamc.br/">
              <img src="{{asset('storage/partners/esamc.jpeg')}}"">   
              </a>
            </div>
          @foreach($partner as $p)
            <div class="carousel-item">
              <a target="_blank" href="{{ url($p->link) }}">
                  <img src="/partner/{{$p->id}}">
              </a>
            </div>
          @endforeach
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
    </div>
    <br>
    <a class="weatherwidget-io" href="https://forecast7.com/pt/n23d50n47d45/sorocaba/" data-label_1="SOROCABA" data-theme="original" >SOROCABA</a>
		<script>
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
		</script>

    
	</section>

</main>





@stop