<div class="form-group">
    <label>{{$title}}</label>
    <input list="{{$name}}_select" type="text" class="form-control" name="{{$name}}" id="{{$name}}_id" value="{{old($name)?old($name):$value}}" onkeyup="{{$event}}" >
    <datalist id="{{$name}}_select">
        @foreach ($options as $option)
            <option value="{{$option['value']}}">{{$option["label"]}}</option>
        @endforeach
    </datalist>
</div>