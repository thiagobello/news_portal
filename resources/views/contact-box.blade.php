@extends('layout')
@section('text')

@foreach($cb as $c)

{{$c->descr}}
{{$c->qtd}}

@endforeach

@stop