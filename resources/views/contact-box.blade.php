@extends('layout')
@section('text')

<!-- Fazer contagens para alimentar as abas
 e pegar dados para alimentar cada aba-->
<?php 
	$id = auth()->user()->id;
	$qtdnaolida = DB::table('contact')->where('id_contact_box', 1)->count();
	$qtdlidas = DB::table('contact')->where('id_contact_box', 2)->count();
	$qtdarquivadas = DB::table('contact')->where('id_contact_box', 3)->count();
	$qtdlixeira= DB::table('contact')->where('id_contact_box', 4)->count();

	$naolidas = DB::table('contact')->where('id_contact_box', 1) ->get();
	$lidas = DB::table('contact')->where('id_contact_box', 2) ->get();
	$arquivadas = DB::table('contact')->where('id_contact_box', 3) ->get();
	$lixeira = DB::table('contact')->where('id_contact_box', 4) ->get();
	 ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Mensagens não lidas: <?php echo $qtdnaolida ?></a></li>
    <li><a data-toggle="tab" href="#menu1">Mensagens Lidas: <?php echo $qtdlidas ?></a></li>
    <li><a data-toggle="tab" href="#menu2">Mensagens Arquivadas: <?php echo $qtdarquivadas ?></a></li>
    <li><a data-toggle="tab" href="#menu3">Lixeira: <?php echo $qtdlixeira ?></a></li>
  </ul>

 <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	@foreach($naolidas as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">Assunto: {{$n->subject}}</h2>
        <p class="article-content">Enviado por:{{$n->name}}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
        </footer>
      </div>    
    </a>
    @endforeach
	</div>	
    <div id="menu1" class="tab-pane fade in active">
	@foreach($lidas as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">Assunto: {{$n->subject}}</h2>
        <p class="article-content">Enviado por:{{$n->name}}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
        </footer>
      </div>    
    </a>
    @endforeach    	
    </div>  
    <div id="menu2" class="tab-pane fade in active">
	@foreach($arquivadas as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">Assunto: {{$n->subject}}</h2>
        <p class="article-content">Enviado por:{{$n->name}}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
        </footer>
      </div>    
    </a>
    @endforeach    	
    </div>     
    <div id="menu3" class="tab-pane fade in active">
	@foreach($lixeira as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">Assunto: {{$n->subject}}</h2>
        <p class="article-content">Enviado por:{{$n->name}}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
        </footer>
      </div>    
    </a>
    @endforeach    	
    </div>         	
    </div>
 </div>    

@stop