@extends('layout')

@section('text')
<div class="news-align">

	<div class="col-md-8 ml-auto mr-auto">
		<h3 class="title">{{$n->title}}</h3>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  			<ol class="carousel-indicators">
    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  			</ol>
  		<div class="carousel-inner">
    		<div class="carousel-item active">
      			<img class="d-block w-100" src="/assets/img/kit/bg.jpg" alt="First slide">
    		</div>
    		<div class="carousel-item">
      			<img class="d-block w-100" src="/assets/img/kit/bg2.jpg" alt="Second slide">
    		</div>
    		<div class="carousel-item">
     			<img class="d-block w-100" src="/assets/img/kit/bg3.jpg" alt="Third slide">
    		</div>
  		</div>
  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>
		</div>
		<p>
			{{$n->notice}}
		</p>

    <a href='/noticias/pendentes/{{$n->id}}/aprovar'> Aprovar </a> <br>
    <a href='/noticias/pendentes/{{$n->id}}/reprovar'> Reprovar </a>

	</div>

</div>



@stop
