@extends('layout')

@section('text')
<form class="form-align" method="POST" id="send_form" enctype="multipart/form-data" onSubmit="return verify()">

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Digite o nome do Parceiro</label>
     <input  name="partner" id="partner" class="form-control" required>
  </div>

  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Insira o Link do Parceiro</label>
     <input  name="link" id="link" class="form-control" required>
  </div>
  <br>
<label for="exampleInput1" class="bmd-label-floating">Logo do Parceiro</label>
<br>
     <input type='file' id="image" name="image" accept="image/*" required/>
<br>
<br>
<br>
<div>
    <button type="submit" class="btn btn-info">Adicionar</button>
</div>
</form>


<table class = "table table-striped table-bordered table-hover">

</table>

<script type="text/javascript" src="{{ asset('assets/js/partners.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/verify.js') }}"></script>

@stop