 @extends('layout')

@section('text')

<div class="slideshow-container">

  <?php $nc = DB::table('news')->where('status','A')->orderBy('views', 'desc')->take(5)->get();

  $i =0;

  foreach($nc as $n)
    {
      if ($i == 0) 
      {
        echo '<div id="slide1" class="mySlides"> 
                <a target="_blank" href="/noticias/'. $n->id. '"> 
                  <img src="/image/'.$n->id .'" style="width:100%"> 
                  <div class="text" style="font-size:200%; text-align: left; font-weight: bold; line-height: 150%; ">' . $n->title .'</div>
                </a>
              </div>';
      }
      else
      {
        echo '<div class="mySlides"> 
                <a target="_blank" href="/noticias/'. $n->id. '"> 
                  <img src="/image/'.$n->id .'" style="width:100%"> 
                  <div class="text" style="font-size:200%; text-align: left; font-weight: bold; line-height: 150%;">' . $n->title .'</div>
                </a>
              </div>';
      }

    $i++;

  }

  ?>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span>  
</div>

<main class="main columns">
  <section class="column">


	@foreach($news as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <figure class="article-image is-16by9">
        <img src="/image/{{$n->id}}" alt="">
      </figure>
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{date('d/m/Y', strtotime($n->date))}}</span>
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

</section>
    
	<section class="column-right">

    <div id="demo" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" >
              <a target="_blank" href="https://esamc.br/">
              <img src="{{asset('storage/partners/esamc.jpeg')}}">   
              </a>
            </div>
            <?php 
               $partner = DB::select('select * from partners');?>
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
    <?php $utility = DB::select('select * from utility');?>
    <table class = "table table-striped table-bordered table-hover">
      @foreach ($utility as $u)
        <tr style="overflow-x:auto;">
          <td>Utilidade</td>
          <td>Valor</td>
          <td>Data de Atualização</td>
        </tr>
        <tr>
          <td> {{$u->name}}</td>
              <td> {{$u->value}}</td>
              <td> {{date( 'd/m/Y' , strtotime($u->updated_at))}}</td>
        </tr>
      @endforeach     
    </table>
    <br>
    <a class="weatherwidget-io" href="https://forecast7.com/pt/n23d50n47d45/sorocaba/" data-label_1="SOROCABA" data-theme="original" >SOROCABA</a>
		<script>
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
		</script>

	</section>

</main>


@stop