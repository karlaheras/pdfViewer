@extends('layouts.plantilla')

@section('title', "Inicio de sesión")

@section('breadcrumbs')
    @include('componentes.breadcrumbs',["breadcrumbs"=>[
        ["url"=>"/","name"=>"Inicio"],
        ["url"=>"/login","name"=>"Iniciar Sesión"],
    ]
])
@endsection

@section('content')

<h1>Iniciar sesión</h1>

<div class="alert alert-info" role="alert">

  <p>Para iniciar sesión se requiere crear una cuenta.</p>  
</div>

@include('componentes.errors')

<div class="row">
    <div class="col-md-6">
        <form action="{{url("/login")}}" method="post">

            @csrf

            @include('componentes.input',["field"=>"email","label"=>"Usuario","type"=>"text", "required"=>false])
        
            @include('componentes.input',["field"=>"password","label"=>"Contraseña","type"=>"password", "required"=>false])

            <input type="submit" value="Iniciar sesión" class="btn btn-success">
        
            <br><br>
            <p>¿Sin cuenta? <a href="{{route('user.create')}}">Click aquí crear una cuenta</a></p><!--
            <p>¿Olvido su contraseña? <a href="{{url('/user/forgot/password/')}}">Click aquí para recuperar contraseña</a></p>-->
        </form>
    </div>

</div>

@endsection