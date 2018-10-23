<div class="mb-8">
    <div class="block text-grey-darkest text-3xl font-normal mb-2 font-bold" for="{{$field_name}}">
        @if($required)*@endif
        @lang('report.'.$field_name.'.label')
    </div>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-dark mb-2 fborder-red border-2"
           id="{{$field_name}}" type="{{$type}}" name="{{$field_name}}" value="{{old($field_name, $event[$field_name])}}">

        @if($errors->has($field_name))
            <span class="text-red">
        @else
            <span class="text-grey-dark">
        @endif

        @lang('report.'.$help)

        </span>
</div>