@extends('layouts.plantilla')

@section('title',"Usuario Detalle")
@section('nav_usuario', "active")

@section('breadcrumbs')
    @include('componentes.breadcrumbs',["breadcrumbs"=>[
        ["url"=>"/","name"=>"Inicio"],
        ["url"=>"/usuario","name"=>"Usuarios"],
        ["url"=>"/usuario","name"=>"Detalle"],
    ]
])
@endsection

@section('content')
    <p><a href="{{url("/usuario/actualizar/".$model->id)}}" class="btn btn-success">Editar Usuario</a></p>

    <table class="table table-bordered">
        <tr>
            <th>Nombre:</th>
            <td>{{$model->name}}</td>
        </tr>
        <tr>
            <th>Correo Electrónico:</th>
            <td>{{$model->email}}</td>
        </tr>
        <tr>
            <th>Fecha de registro:</th>
            <td>{{$model->created_at}}</td>
        </tr>
        <tr>
            <th>Última actualización:</th>
            <td>{{$model->updated_at}}</td>
        </tr>
    </table>

@endsection