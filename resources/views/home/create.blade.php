
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