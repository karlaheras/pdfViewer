@extends('layouts.plantilla')
@section('title','formas')

@section('content')

<h1 style="text-align: center">Lista de Documentos</h1>
@if (auth()->user()->rol_id == 1)
        <div class="row">       
            
            <div class="col-md-12">
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
                <form method="post" id="upload_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card card-body">
                        <div class="p-2 card">
                            <div class="card-header">
                            Subir Documento
                            </div>
                            <input type="text" name="nombre" id="nombre" />
                            <input type="file" name="url" id="select_file" />
                            <br>
                            <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"  >
                        </div>
                        <br>
                        
                    </div>

                </form>
            </div>
        </div>

@endif 
    <br />
    <div id="GuardarPdf" >
        <div class="table-responsive">
        @include("home._table",["model"=>$model])
        </div>
    </div>

@section('js')
<script>
    $(document).ready(function(){

        $('#upload_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('home.store') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    $("#GuardarPdf").html(data.GuardarPdf);
                }
            })
        });  
       
    });
   
    
</script>

@endsection
@endsection


@section('modal')
@include('componentes.confirm')
@endsection