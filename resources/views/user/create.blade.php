@extends('layouts.plantilla')

@section('title',"Registrar usuario")


@section('content')
    <h1>Registrar usuario</h1>
    


    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data" id="form1"> 
        @csrf
        <br>
        <br>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Registrar Usuario</legend>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" placeholder="Nombre Completo" value="{{old('name')}}" id="name">
                    @error('name')
                    <br>
                    <small>{{$message}}</small>
                    <br>
                    @enderror
                    <br>
                </div>
                
                <div class="col-sm">
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{old('email')}}">
                    @error('email')
                    <br>
                    <small>{{$message}}</small>
                    <br>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{old('password')}}" id="txtPassword" onkeypress="validateForm()" >
                    @error('password')
                    <br>
                    <small>{{$message}}</small>
                    <br>
                    @enderror
                    <div id="strengthMessage"></div>
                </div>
    
                <div class="col-sm">
                    <div class="dropdown">   
                        <select name="rol_id" id="" aria-placeholder="Nivel de acceso" class="form-select">
                            <option selected>Selecciona el nivel de acceso</option>
                            <option value="1" {{ old('rol_id') == 0 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ old('rol_id') == 1 ? 'selected' : '' }}>Empleado</option>
                        </select>
                        @error('rol_id')
                        <br>
                        <small>{{$message}}</small>
                        <br>
                        @enderror
                    </div>
                </div>
    
                
            </div>
          
            
        </fieldset> 
    
        <br>
        <div style="text-align: center">
            <button type="submit" class="btn btn-success col-sm-3">Guardar</button>
        </div>
    </form>   

    @section('js')
    <script>
        
        $(document).ready(function () {
    $('#txtPassword').keyup(function () {
        $('#strengthMessage').html(checkStrength($('#txtPassword').val()))
    })
    function checkStrength(password) {
        var strength = 0
        if (password.length < 10) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Short')
            return 'Too short'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        if (strength < 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Weak')
            return 'Weak'
        } else if (strength == 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Good')
            return 'Good'
        } else {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Strong')
            return 'Strong'
        }
    }
});
        

    </script>

    @endsection

@endsection