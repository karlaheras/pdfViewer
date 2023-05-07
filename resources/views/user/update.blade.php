@extends('layouts.plantilla')

@section('title',"Editar usuario")
@section('nav_usuario', "active")

@section('breadcrumbs')
    @include('componentes.breadcrumbs',["breadcrumbs"=>[
        ["url"=>"/","name"=>"Inicio"],
        ["url"=>"/usuario","name"=>"Usuarios"],
        ["url"=>"/usuario/actualizar","name"=>"Editar"],
    ]
])
@endsection

@section('content')
    <h1>Actualizar usuarios</h1>
    
    @include('componentes.form',["action"=>url("/usuario/actualizar/".$model->id), "method"=>"post", "inputs"=>$model->updateFormColumns()])

@endsection