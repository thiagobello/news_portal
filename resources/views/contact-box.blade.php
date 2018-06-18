@extends('layout')
@section('text')

<?php 
	$id = auth()->user()->id;
	$qtdnaolida = DB::table('contact')->where('id_contact_box', 1)->count();
	$qtdlidas = DB::table('contact')->where('id_contact_box', 2)->count();
	$qtdarquivadas = DB::table('contact')->where('id_contact_box', 3)->count();

	$naolidas = DB::table('contact')->where('id_contact_box', 1)->orderby('date', 'asc') ->get();
	$lidas = DB::table('contact')->where('id_contact_box', 2)->orderby('date', 'asc')  ->get();
	$arquivadas = DB::table('contact')->where('id_contact_box', 3)->orderby('date', 'asc')  ->get();
	 ?>

<!-- Fazer contagens para alimentar as abas
 e pegar dados para alimentar cada aba-->
<div id="tabs">
  <ul>
    <li><a href="#home">Mensagens não lidas: <?php echo $qtdnaolida ?></a></li>
    <li><a href="#menu1">Mensagens lidas: <?php echo $qtdlidas ?></a></li>
    <li><a href="#menu2">Mensagens arquivadas: <?php echo $qtdarquivadas ?></a></li>
  </ul>
  <div id="home">
      @foreach($naolidas as $n)
        <a class="article" href="/mensagem/{{$n->id}}">
          <div class="article-body">
            <h2 class="article-title">Assunto: {{$n->subject}}</h2>
            <p class="article-content">Enviado por: {{$n->name}}</p>
            <footer class="article-info">
              <span>Data de envio: {{date('d/m/Y', strtotime($n->date))}}</span>
            </footer>
          </div>    
        </a>
        @endforeach     
  </div>
  <div id="menu1">
    @foreach($lidas as $n)
      <a class="article" href="/mensagem/{{$n->id}}">
        <div class="article-body">
             <h2 class="article-title">Assunto: {{$n->subject}}</h2>
             <p class="article-content">Enviado por: {{$n->name}}</p>
            <footer class="article-info">
              <span>Data de envio: {{date('d/m/Y', strtotime($n->date))}}</span>
          </footer>
        </div>    
      </a>
    @endforeach 
  </div>
  <div id="menu2">
    @foreach($arquivadas as $n)
      <a class="article" href="/mensagem/{{$n->id}}">
        <div class="article-body">
             <h2 class="article-title">Assunto: {{$n->subject}}</h2>
            <p class="article-content">Enviado por: {{$n->name}}</p>
            <footer class="article-info">
              <span>Data de envio: {{date('d/m/Y', strtotime($n->date))}}</span>
          </footer>
        </div>    
      </a>
    @endforeach
  </div>
</div>

<br>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs({
      collapsible: true
    });
  } );
  </script>
  @stop