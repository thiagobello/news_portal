@extends('layout')
@section('text')

<form action="/criar-usuario/novo" method="post">

  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Nome</label>
     <input name="name" class="form-control" value="{{old('name')}}">
     <span class="bmd-help">Aqui você vai inserir o nome do usuário.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">E-Mail</label>
     <input name="email" class="form-control" value="{{old('email')}}">
     <span class="bmd-help">Aqui você vai inserir o E-Mail do usuário.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Nível de acesso</label>
     <select name="id_acess" class="form-control" id="id_acess">
        @foreach($access_level as $c)
        <option value="{{$c->id}}">{{$c->name_level}}</option>
        @endforeach
     </select>

  </div>
  <div class="form-group">
    <label class="label-control">Senha</label>
    <input name="password" type="password" class="form-control datetimepicker" value="{{old('subject')}}"/>
         <span class="bmd-help">Aqui você vai inserir a senha do usuário.</span>
  </div>


  <button type="submit" class="btn btn-info">Enviar</button>

</form>


@stop