@extends('layout')

@section('text')

<form action="/contato/enviar" method="post">

 <?php 
    if (!empty($resultado)) {
      echo $resultado;
    }
  ?>

  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Nome </label>
     <input name="name" class="form-control" value="{{old('name')}}" required>
     <span class="bmd-help">Aqui você vai por o seu nome.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">E-Mail </label>
     <input name="email" class="form-control" value="{{old('email')}}" required>
     <span class="bmd-help">Aqui você vai por o seu E-Mail.</span>
  </div>
  <div class="form-group">
    <label class="label-control">Assunto</label>
    <input name="subject" type="text" class="form-control datetimepicker" value="{{old('subject')}}" required />
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Conte-nos mais sobre seu problema ou sugestão. </label>
    <textarea name="text" class="form-control" value="{{old('text')}}" required></textarea>
  </div>


  <button type="submit" class="btn btn-info">Enviar</button>

</form>

@stop