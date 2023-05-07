@extends('layouts.plantilla')

@section('title',"Registrar usuario")


@section('content')
    <h1>Registrar usuario</h1>
    
    @include('componentes.form',["action"=>url("/usuario/registrar"), "method"=>"post", "inputs"=>$inputs])

@endsection