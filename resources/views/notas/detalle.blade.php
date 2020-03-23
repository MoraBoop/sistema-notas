@extends('plantilla')

@section('contenido')

<h1>Detalle de nota</h1>

<h4>{{$nota->id}}</h4>
<h4>{{$nota->nombre}}</h4>
<h4>{{$nota->descripcion}}</h4>

@endsection