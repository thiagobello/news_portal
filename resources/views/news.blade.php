@extends('home')

@section('text')

<form class="form-align" action="/noticias/criar" method="post">

  <input type="hidden" name="_token" value="{{csrf_token()}}" />

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Quem está publicando?</label>
     <input  name="users_id" class="form-control" value="{{old('users_id')}}">
     <span class="bmd-help">Digite o nome de quem está publicando.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Categoria</label>
     <input name="category_id" class="form-control" value="{{old('category_id')}}">
     <span class="bmd-help">Digite a categoria.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Título da Noticia</label>
     <input name="title" class="form-control" value="{{old('title')}}">
     <span class="bmd-help">Aqui você vai por o titulo da noticia.</span>
  </div>
  <div class="form-group">
    <label class="label-control">Data de Publicação</label>
    <input name="date" type="text" class="form-control datetimepicker" value="{{old('date')}}"/>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Noticia</label>
    <textarea name="notice" class="form-control" rows="3" value="{{old('notice')}}"></textarea>
  </div>

  <button type="submit" class="btn btn-info">Publicar</button>

</form>

@stop