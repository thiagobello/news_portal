@extends('layout')
@section('text')
<div class="news-align">
	@foreach($ctt as $ctt)
          <div class="article-body">
            <h2 class="article-title">Assunto: {{$ctt->subject}}</h2>
            <p class="article-content"><b>Enviado por :</b> {{$ctt->name}} <br>
            <b>Mensagem :</b> {{$ctt->text}}</p>
            <footer class="article-info">
              <span><b>Data de envio: </b> {{$ctt->date = date('d/m/y')}}</span>
            </footer>
          </div>  
	</div>
	@endforeach
	<a href="/mensagem/arquivar/{{$ctt->id}}"><button type="submit" class="btn btn-info">Arquivar</button></a>
	<a href="/mensagem/deletar/{{$ctt->id}}"><button type="submit" class="btn btn-info">Deletar</button></a>
</div>
@stop