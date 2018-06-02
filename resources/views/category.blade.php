@extends('layout')

@section('text')
<form class="form-align" action="/categorias/adiciona" method="post">

  <input type="hidden" name="_token" value="{{csrf_token()}}" />

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Digite o nome da nova categoria.</label>
     <input  name="name" class="form-control">
  </div>
  <button type="submit" class="btn btn-info">Adicionar</button>

</form>
<table class = "table table-striped table-bordered table-hover">
	@foreach ($category as $c)
		<tr> 
			<td> {{$c-> name}}</td>
      <td><a href="/categoria/detalhe/{{$c->id}}">  Detalhes  </a> </td>
		</tr>
	@endforeach		
</table>

@stop