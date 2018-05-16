@extends('layout')

@section('text')

<form action="/login" method="post">

  <input type="hidden" name="_token" value="{{csrf_token()}}" />

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Email</label>
     <input  name="email" class="form-control" value="{{old('users_id')}}">
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Senha</label>
     <input type="password" name="password" class="form-control" value="{{old('users_id')}}">
  </div>


  <button type="submit" class="btn btn-info">Logar</button>

</form>

@stop