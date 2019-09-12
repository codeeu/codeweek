<div class="codeweek-form-field-wrapper">
    <div class="codeweek-form-field">
        <label for="{{$field_name}}">
            @if($required)*@endif
            @lang($section.'.'.$field_name.'.label')
        </label>
        <input id="{{$field_name}}"
               type="{{$type}}"
               name="{{$field_name}}"
               value="{{old($field_name)}}">
    </div>
    <div class="errors">
        @component('components.validation-errors', ['field'=>'title'])@endcomponent
    </div>
    <div class="info">
        @lang($section.'.'.$help)
    </div>
</div>