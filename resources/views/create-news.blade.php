@extends('layout')

@section('text')


<form method="POST" id="send_form">

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Quem está publicando?</label>
     <input  name="user" class="form-control" id="user">
     <span class="bmd-help">Digite o nome de quem está publicando.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Categoria</label>
     <select name="category" class="form-control" id="category">
        @foreach($category as $c)
        <option value="{{$c->id}}">{{$c->name}}</option>
        @endforeach
     </select>

  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Título da Noticia</label>
     <input name="title" class="form-control" id="title">
     <span class="bmd-help">Aqui você vai por o titulo da noticia.</span>
  </div>
  <div class="form-group">
    <label class="label-control">Data de Publicação</label>
    <input name="date" type="text" class="form-control datetimepicker" id="date" />
  </div>
  
  
  <textarea name="notice" id="notice" rows="10" cols="80"></textarea>
  
  <script>CKEDITOR.replace( 'notice' );</script>
  <button type="submit" class="btn btn-info">Publicar</button>
  
</form>


<script type="text/javascript" src="assets/js/example.js"></script>

@stop