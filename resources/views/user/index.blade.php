@extends('layouts.plantilla')

@section('title',"Usuarios")
@section('nav_usuario', "active")

@section('breadcrumbs')
    @include('componentes.breadcrumbs',["breadcrumbs"=>[
        ["url"=>"/","name"=>"Inicio"],
        ["url"=>"/usuario","name"=>"Usuarios"],
    ]
])
@endsection

@section('content')
    <h1>Usuarios</h1>
    <a href="{{url("/usuario/registrar")}}" class="btn btn-success">Registrar usuario</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Opciones</th>
        </tr>
        @foreach ($model->items() as $item)
            <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->name}}</th>
                <th>{{$item->email}}</th>
                <th>
                    <a href="{{url("/usuario/".$item->id)}}" class="btn btn-primary">Detalle</a>
                    <a href="{{url("/usuario/actualizar/".$item->id)}}" class="btn btn-warning">Editar</a>
                    <div class="btn btn-danger" onclick="confirmModal('¿Borrar registro?','{{url('/usuario/delete/'.$item->id)}}')">Borrar</div>
                </th>
            </tr>
        @endforeach
    </table>

    {{$model->links()}}
@endsection
@section('modal')
    @include('componentes.confirm')
@endsection