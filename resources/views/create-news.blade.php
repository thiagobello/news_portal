@extends('layout')

@section('text')

<!-- Pegar o usuário logado para passar para o input
  Pegar a data atual para passar para o input !-->
<?php 
  $name = auth()->user()->name;
  $id = auth()->user()->id;
  date_default_timezone_set('America/Sao_Paulo');
  $data = date('d/m/y');
?>
<form method="POST" id="send_form" enctype="multipart/form-data" onSubmit="return verify()">

<label for="exampleInput1" class="bmd-label-floating">Capa da Notícia</label>
<br>
 <input type='file' id="image" name="image" accept="image/*" required/>
<br>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Quem está publicando?</label>
     <input  name="user" class="form-control" id="user" readonly="true" type="text" value="<?php echo $name ?>">
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Categoria</label>
     <select name="category" class="form-control" id="category">
        <option value="" selected disabled hidden>Selecione uma categoria</option>
        @foreach($category as $c)
        <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
     </select>

  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Título da Noticia</label>
     <input name="title" class="form-control" id="title" required>
     <span class="bmd-help">Aqui você vai por o titulo da noticia.</span>
  </div>
  <div class="form-group">
    <label class="label-control">Data de Publicação</label>
    <input name="date" type="text" class="form-control datetimepicker" id="date" value="<?php echo $data?>" readonly="true"/> 
  </div>
  
  
  <textarea name="notice" id="notice" rows="10" cols="80">Digite a notícia...</textarea>
  
  <script>CKEDITOR.replace('notice');</script>



  <button type="submit" class="btn btn-info">Publicar</button>
  
</form>

<script type="text/javascript" src="{{ asset('assets/js/verify.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/example.js') }}"></script>

@stop