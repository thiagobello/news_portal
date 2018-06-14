@extends('layout')

@section('text')
<div class="news-align">

	<div class="col-md-8 ml-auto mr-auto">
		<h3 class="title">{{$n->title}}</h3>
      <img src="/image/{{$n->id}}" alt="">
		<p>
			{!!$n->notice!!}
		</p>


	</div>

</div>



@stop
