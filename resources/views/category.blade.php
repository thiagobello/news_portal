@extends('layout')

@section('text')
<?php if (Auth::guest()) {
  return redirect('/login');
}
  if (!Auth()->user()->id_acess_level == 1) {
    return redirect ('/home');
  }
 ?>
<form id="send_form" class="form-align"  method="post" action="/categorias/adiciona">

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Digite o nome da nova categoria.</label>
     <input  name="category_m" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-info">Adicionar</button>

</form>

<table class = "table table-striped table-bordered table-hover">
	@foreach ($category as $c)
  <?php  $qtd = DB::table('news')->where('category_id', $c->id)->count(); ?>
		<tr> 
			<td> {{$c-> name}}</td>
      <td ><a href="/categoria-editar/{{$c->id}}" class="btn btn-info btn-sm" role="button">Editar</a> 
        <?php if ($qtd == 0): ?>
          <a href="/categoria-excluir/{{$c->id}}" class="btn btn-danger btn-sm" role="button">Excluir</a></td>
        <?php endif ?>
		</tr>
	@endforeach		
</table>

<script type="text/javascript" src="{{ asset('assets/js/verify.js') }}"></script>

@stop