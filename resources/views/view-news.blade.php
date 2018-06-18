@extends('layout')

@section('text')
<div class="news-align">

	<div class="col-md-8 ml-auto mr-auto">

      	<center><img src="/image/{{$n->id}}" alt=""></center>
      			<h3 class="title" style="text-align: left;">{{$n->title}}</h3>	
		<p style="text-align: left;">{!!$n->notice!!}</p>
	</div>

</div>



@stop
