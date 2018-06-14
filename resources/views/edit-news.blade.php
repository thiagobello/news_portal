@extends('layout')

@section('text')


<form method="post" id="send_form" enctype="multipart/form-data">

<input type="hidden" id="id" name="id" value="{{$news->id}}">

 <input type='file' id="image" name="image" accept="image/*"/>

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
     <input name="title" class="form-control" id="title" value="{{$news->title}}">
     <span class="bmd-help">Aqui você vai por o titulo da noticia.</span>
  </div>
  <div class="form-group">
    <label class="label-control">Data de Publicação</label>
    <input name="date" type="text" class="form-control datetimepicker" id="date" value="{{$news->date}}">
  </div>
  
  
  <textarea name="notice" id="notice" rows="10" cols="80">{{$news->notice}}</textarea>
  
  <script>CKEDITOR.replace( 'notice' );</script>



  <button type="submit" class="btn btn-info">Publicar</button>
  
</form>

    <script type="text/javascript" src="{{ asset('assets/js/editNews.js') }}"></script>


@stop