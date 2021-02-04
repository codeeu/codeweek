<div class="codeweek-form-field-wrapper">
    <div class="codeweek-form-field">
        <label for="{{$field_name}}">
            @if($required)*@endif
                {{$label}}
        </label>
        <input id="{{$field_name}}"
               type="{{$type}}"
               name="{{$field_name}}"
               value="{{old($field_name)}}">
    </div>

    @if($errors->has($field_name))
        <div class="errors">
        @component('components.validation-errors', ['field'=>$field_name])@endcomponent
        </div>
    @endif


</div>