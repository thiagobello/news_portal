@extends ('layout')
@section('text')
<?php $users = db::table('users')->get(); ?>
<div id="tabs">
  <ul>
    <li><a href="#home">Criar Usuário </a></li>
    <li><a href="#menu1">Lista de Usuários</a></li>
  </ul>
  <div id="home">
<!-- FORMULÁRIO PARA CRIAÇÃO DE LOGIN -->
<form action="/criar-usuario/novo" method="post">

  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">Nome</label>
     <input name="name" class="form-control" value="{{old('name')}}" required>
     <span class="bmd-help">Aqui você vai inserir o nome do usuário.</span>
  </div>
  <div class="form-group">
     <label for="exampleInput1" class="bmd-label-floating">E-Mail</label>
     <input name="email" class="form-control" value="{{old('email')}}" required>
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
    <input name="password" type="password" class="form-control datetimepicker" value="{{old('subject')}}" required/>
         <span class="bmd-help">Aqui você vai inserir a senha do usuário.</span>
  </div>
  <button type="submit" class="btn btn-info">Criar</button>

</form>  
  </div>

<!-- LISTA CONTENDO TODOS USUÁRIOS CADASTRADOS NO BD PARA RESET DE SENHA-->

  <div id="menu1">
    @foreach($users as $n)
    <a class="article" href="/usuarios/editar/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->name}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{{$n->email}}</p>
        <footer class="article-info">
        </footer>
      </div>    
    </a>
    @endforeach      
  </div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#tabs" ).tabs({
    });
  } );
</script>
@stop