@extends('layout')
@section('text')
<?php 
  $name = auth()->user()->name;
  $email = auth()->user()->email;


?>

<form action="/minha-conta/alterar" method="post">
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Seu nome: </label>
     <input  name="name" class="form-control" id="name" type="text" value="<?php echo $name ?>">
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Seu email: </label>
     <input  name="email" class="form-control" id="email" type="text" value="<?php echo $email ?>">
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Senha: </label>
     <input  name="password" class="form-control" id="email" type="password">
  </div>  

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  Atualizar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Você tem certeza que deseja alterar seus dados?</h5>
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