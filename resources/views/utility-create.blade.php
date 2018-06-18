@extends('layout')

@section('text')
<?php 
  date_default_timezone_set('America/Sao_Paulo');
  $data = date('d/m/y');
?>

<form class="form-align" action="/utilidades-criar" method="post">

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Qual a utilidade?</label>
     <input  name="name" class="form-control" value="{{old('name')}}" required>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Qual o valor?</label>
     <input  name="value" class="form-control" value="{{old('value')}}" required>
  </div>
  <div class="form-group">
    <label class="label-control">Data de Atualização</label>
    <input name="date" type="text" class="form-control datetimepicker" id="date" value="<?php echo $data?>" readonly="true"/> 
  </div>
  <button type="submit" class="btn btn-info">Adicionar</button>

</form>
<table class = "table table-striped table-bordered table-hover">
      <tr>
      <td>Utilidade</td>
      <td>Valor</td>
      <td>Data de Atualização</td>
    </tr>
	@foreach ($utility as $u)
		<tr>
			<td> {{$u->name}}</td>
      		<td> {{$u->value}}</td>
      		<td> {{date( 'd/m/Y' , strtotime($u->updated_at))}}</td>
		</tr>
	@endforeach			
</table>

@stop