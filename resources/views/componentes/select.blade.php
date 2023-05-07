{{/*
    requiere:
        * field => nombre del campo
        * label => texto que se muestra en el label
        * required => true|false
        * select_name => nombre que se muestra
        * select_value => valor a seleccionar (generalmente es id)
        * options => arreglo de modelos
*/""}}
<div class="form-group">
    <label for="{{$field}}_select" class="{{$errors->has($field)?"text-danger":""}}">{!! $required?"<b>*</b> ":"" !!}{{$label}}</label>
    <select class="form-control {{$errors->has($field)?"is-invalid":""}}" name="{{$field}}" id="{{$field}}_input" {{$required?"required":""}}>
        <option value="">Seleccione una opción</option>
        @foreach ($options as $element)
            <option value="{{$element->$select_value}}" {{old($field)&&old($field)==$element->$select_value?"selected":""}} {{(isset($value) && !old($field))? ($value == $element->$select_value?"selected":"") : ""}}>{{$element->$select_name}}</option>
        @endforeach
    </select>
    @if ($errors->has($field))
        <small id="{{$field}}_help" class="text-danger">
            @foreach ($errors->get($field) as $item)
                {{$item}}
            @endforeach
        </small>
    @endif
</div>

