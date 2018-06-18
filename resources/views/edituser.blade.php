@extends('layout')
@section('text')

 @foreach($user as $u)
<form action="/usuarios/resetar/{{$u->id}}" method="post">
 
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Nome do usuário:  </label>
     <input  name="name" class="form-control" id="name" type="text" value="{{$u->name}}" required readonly="true">
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Email do usuário: </label>
     <input  name="email" class="form-control" id="email" type="text" value="{{$u->email}}" required readonly="true">
  </div>
  @endforeach 

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  Resetar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Você tem certeza que deseja resetar a senha desse usuário ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-info">Confirmar</button>
      </div>
    </div>
  </div>
</div>	


</form>  
     
@stop