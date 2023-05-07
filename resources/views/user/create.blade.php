@extends('layouts.plantilla')

@section('title',"Registrar usuario")
@section('nav_usuario', "active")

@section('breadcrumbs')
    @include('componentes.breadcrumbs',["breadcrumbs"=>[
        ["url"=>"/","name"=>"Inicio"],
        ["url"=>"/usuario","name"=>"Usuarios"],
        ["url"=>"/usuario/registrar","name"=>"Registro"],
    ]
])
@endsection

@section('content')
    <h1>Registrar usuario</h1>
    
    @include('componentes.form',["action"=>url("/usuario/registrar"), "method"=>"post", "inputs"=>$inputs])

@endsection