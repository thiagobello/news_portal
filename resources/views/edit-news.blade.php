@extends('layout')

@section('text')
<?php
  date_default_timezone_set('America/Sao_Paulo');
  $data = date('d/m/y');
?>
<form method="post" id="send_form" enctype="multipart/form-data" onSubmit="return verify()">

<input type="hidden" id="id" name="id" value="{{$news->id}}">

<label for="exampleInput1" class="bmd-label-floating">Capa da Notícia</label>
<br>
 <input type='file' id="image" name="image" accept="image/*"/>
<br>

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Categoria</label>
     <select name="category" class="form-control" id="category">
        @foreach($category as $c)
          <option value="{{$c->id}}" {{ $selected == $c->id ? 'selected="selected"' : '' }}>{{ $c->name }}</option>
        @endforeach
     </select>

  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Título da Noticia</label>
     <input name="title" class="form-control" id="title" value="{{$news->title}}" required>
     <span class="bmd-help">Aqui você vai por o titulo da noticia.</span>
  </div>
  <div class="form-group">
    <label class="label-control">Data de Edição</label>
    <input name="date" type="text" class="form-control datetimepicker" id="date" value="<?php echo $data?>" readonly="true"/> 
  </div>
  
  
  <textarea name="notice" id="notice" rows="10" cols="80">{{$news->notice}}</textarea>
  
  <script>CKEDITOR.replace( 'notice' );</script>



  <button type="submit" class="btn btn-info">Editar</button>
  
</form>

<script type="text/javascript" src="{{ asset('assets/js/editNews.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/verify.js') }}"></script>

@stop