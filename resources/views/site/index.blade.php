@extends('layouts.plantilla')

@section('title', "Home")
@section('nav_home', "active")

@section('content')
    <h1>Página de inicios</h1>
<?php
echo gethostname();
?>
@endsection
