@extends('layout')
@section('text')

<!-- Fazer contagens para alimentar as abas
 e pegar dados para alimentar cada aba-->
<?php 
	$id = auth()->user()->id;
	$qtdativos = DB::table('news')->where('users_id', $id)->where('status', 'A')->count();
	$qtdpendentes = DB::table('news')->where('status', 'P')->count();
	$qtdreprovados= DB::table('news')->where('users_id', $id)->where('status', 'R')->count();
	$qtdaprovadospormim = DB::table('news')->where('approved_by', $id)->where('status', 'A')->count();
	$qtdreprovadospormim = DB::table('news')->where('reproved_by', $id)->where('status', 'R')->count();

    $ativos = db::table('news')->where('users_id', $id)->where('status', 'A')->get();
    $pendentes = db::table('news')->where('status', 'P')->get();
    $reprovados = db::table('news')->where('users_id', $id)->where('status', 'R')->get();
    $aprovadospormim = db::table('news')->where('approved_by', $id)->where('status', 'A')->get();
    $reprovadospormim = db::table('news')->where('reproved_by', $id)->where('status', 'R')->get();
 ?>
<div id="tabs">
  <ul>
    <li><a href="#home">Notícias ativas: <?php echo $qtdativos ?></a></li>
    <li><a href="#menu1">Notícias pendentes: <?php echo $qtdpendentes ?></a></li>
    <li><a href="#menu2">Notícias reprovadas: <?php echo $qtdreprovados ?></a></li>
    <li><a href="#menu3">Aprovadas por mim: <?php echo $qtdaprovadospormim ?></a></li>
    <li><a href="#menu4">Reprovadas por mim: <?php echo $qtdreprovadospormim ?></a></li>
  </ul>
  <div id="home">
    @foreach($ativos as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style="max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{date('d/m/Y', strtotime($n->date))}}</span><br>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
   @endforeach     
  </div>
  <div id="menu1">
    @foreach($pendentes as $n)
    <a class="article" href="/noticias/pendentes/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{date('d/m/Y', strtotime($n->date))}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach      
  </div>
  <div id="menu2">
    @foreach($reprovados as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{date('d/m/Y', strtotime($n->date))}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach
  </div>
  <div id="menu3">
    @foreach($aprovadospormim as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{date('d/m/Y', strtotime($n->date))}}</span>
          <span>{{$n->views}} Visitas</span>
        </footer>
      </div>    
    </a>
    @endforeach
  </div>
  <div id="menu4">
    @foreach($reprovadospormim as $n)
    <a class="article" href="/noticias/{{$n->id}}">
      <div class="article-body">
        <h2 class="article-title">{{$n->title}}</h2>
        <p class="article-content"  style=" max-width: 80ch; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">{!!$n->notice!!}</p>
        <footer class="article-info">
          <span>{{date('d/m/Y', strtotime($n->date))}}</span>
          <span>{{$n->views}} Visitas</span>
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
    });
  } );
</script>
@stop