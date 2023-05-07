@extends('layouts.plantilla')
@section('title','formas')

@section('breadcrumbs')
    @include('componentes.breadcrumbs',['breadcrumbs'=>[
        ['url'=>"/",'name'=>'inicio'],
        ['url'=>"/listatemplate",'name'=>'lista'],
        ['url'=>"/",'name'=>'show'],
    ]]) 
@endsection
@section('content')

<h1 style="text-align: center">welcome</h1>
<div class="row">       
       
    <div class="col-md-12">
       
            <div class="card card-body">
                <div class="p-2 card">
                    <div class="card-header">
                    Registrar Salida de Efectivo
                    </div>
                    
                    @include('home.create')
                    <br>
                    <div class="btn btn-success" onclick="guardarPdf()">Guardar</div>
                </div>
                <br>
                <div id="GuardarPdf" >
                    <div class="table-responsive">
                    @include("home._table",["model"=>$model])
                    </div>
                </div>
            </div>
       
    </div>
</div>

@section('js')
<script>
function guardarPdf(){
    nombrepdf=$("#nombre_pdf").val();
    var urlpdf = document.getElementById("url_pdf").files;
    formdata={nombre:nombrepdf,url:urlpdf,_token:"{{csrf_token()}}"};
    $.ajax({type:"post",
        data:formdata,
        url:"{{url('home/create')}}",
        success:function(data){
            $("#GuardarPdf").html(data);
        }
    });                   
}

</script>

@endsection
@endsection


@section('modal')
@include('componentes.confirm')
@endsection