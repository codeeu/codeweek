<div class="mb-4">
    <div>
        <label for="{{$field_name}}" class="block text-xl text-slate-500 mb-2">
            @lang('report.'.$field_name.'.label')
            @if($required)*@endif
        </label>
        <input id="{{$field_name}}"
               type="{{$type}}"
               name="{{$field_name}}"
               class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
               value="{{old($field_name, $event[$field_name])}}">
    </div>
    <div class="errors text-red-500">
        @component('components.validation-errors', ['field'=>$field_name])@endcomponent
    </div>
    <div class="text-[16px] font-semibold text-slate-500">
        @lang('report.'.$help)
    </div>
</div>