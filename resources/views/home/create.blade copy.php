
<div class="">
    <div class="col-sm">
        <input type="text" class="form-control" name="nombre" placeholder="nombre" value="{{old('nombre')}}" id="nombre_pdf">
        @error('nombre')
        <br>
        <small>{{$message}}</small>
        <br>
        @enderror
        <br>
    </div>
    <div class="col-sm">
        <input type="file" class="form-control" name="url"  value="{{old('url')}}" id="url_pdf">
        @error('url')
        <br>
        <small>{{$message}}</small>
        <br>
        @enderror
        <br>
    </div>
   
</div>


@extends('layouts.plantilla')
@section('title',' create')
<style>
.image-upload > input
{
    display: none;
}
.image-upload img
{
    width: 60px;
    cursor: pointer;
}
</style>
@section('content')
<h1>Registrar una nueva Area</h1> 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hay problemas con tu formulario.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <br>
    <br>
    <div class="col-sm-4">
        


        <div class="col-sm">
            <input type="text" class="form-control" name="nombre" placeholder="nombre" value="{{old('nombre')}}" id="nombre_pdf">
            @error('nombre')
            <br>
            <small>{{$message}}</small>
            <br>
            @enderror
            <br>
        </div>
        <div class="col-sm">
            <input type="file" class="form-control" name="url"  value="{{old('url')}}" id="url_pdf">
            @error('url')
            <br>
            <small>{{$message}}</small>
            <br>
            @enderror
            <br>
        </div>
        <div class="">
            <div style="text-align: center">
                <button type="submit" class="btn btn-success col-sm-3">Guardar</button>
            </div>
        </div>
    </div>
    
    <br>
    
</form>


@endsection