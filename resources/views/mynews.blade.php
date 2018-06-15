@extends('layout')
@section('text')

<!-- Fazer contagens para alimentar as abas-->
<?php 
	$id = auth()->user()->id;
	$qtdativos = DB::table('news')->where('users_id', $id)->where('status', 'A')->count();
	$qtdpendentes = DB::table('news')->where('users_id', $id)->where('status', 'P')->count();
	$qtdreprovados= DB::table('news')->where('users_id', $id)->where('status', 'R')->count();
	$qtdaprovadospormim = DB::table('news')->where('approved_by', $id)->count();
	$qtdreprovadospormim = DB::table('news')->where('reproved_by', $id)->count();

    $ativos = db::table('news')->where('users_id', $id)->where('status', 'A')->get();
    $pendentes = db::table('news')->where('users_id', $id)->where('status', 'P')->get();
    $reprovados = db::table('news')->where('users_id', $id)->where('status', 'R')->get();
    $aprovadospormim = db::table('news')->where('approved_by', $id)->get();
    $reprovadospormim = db::table('news')->where('reproved_by', $id)->get();
 ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Notícias ativas: <?php echo $qtdativos ?></a></li>
    <li><a data-toggle="tab" href="#menu1">Notícias pendentes: <?php echo $qtdpendentes ?></a></li>
    <li><a data-toggle="tab" href="#menu2">Notícias reprovadas: <?php echo $qtdreprovados ?></a></li>
    <li><a data-toggle="tab" href="#menu3">Aprovadas por mim: <?php echo $qtdaprovadospormim ?></a></li>
    <li><a data-toggle="tab" href="#menu4">Reprovadas por mim: <?php echo $qtdreprovadospormim ?></a></li>
  </ul>

 <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	@foreach($ativos as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach    	
    </div>
    <div id="menu1" class="tab-pane fade">
 	@foreach($pendentes as $n)
    <a class="article" href="/noticias/pendentes/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach 
    </div>
    <div id="menu2" class="tab-pane fade">
 	@foreach($reprovados as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach
    </div>
    <div id="menu3" class="tab-pane fade">
 	@foreach($aprovadospormim as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach
    </div>
        <div id="menu4" class="tab-pane fade">
 	@foreach($reprovadospormim as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{$n->date}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach
    </div>
  </div>
<br>
@stop