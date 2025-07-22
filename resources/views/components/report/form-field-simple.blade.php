<div class="mb-4 font-[Blinker]">
    <div>
        <div class="flex gap-1">
            <label for="{{$field_name}}" class="block text-xl text-slate-500 mb-2">
                @lang($section.'.'.$field_name.'.label')
                @if($required)*@endif
            </label>
            <img class="w-6 h-6" src="/images/icon_info.svg" />
        </div>
        <div class="relative">
            @if($type != 'date')
                <input id="{{$field_name}}"
                  type="{{$type}}"
                  name="{{$field_name}}"
                  placeholder="{{$placeholder ?? null}}"
                  class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3 text-xl"
                  value="{{old($field_name)}}">
            @else
            <div class="relative border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-1 appearance-none text-slate-600 mb-3 py-1 text-xl">
                <date-time
                  name="{{$field_name}}"
                  :flow="['calendar', 'time']"
                  placeholder="{{$placeholder ?? null}}"
                  value="{{old($field_name)}}"
                ></date-time>
                <div class="cursor-pointer absolute top-1/2 right-4 -translate-y-1/2">
                  <img src="/images/select-arrow.svg" />
                </div>
            </div>
            @endif
        </div>
    </div>

    @if($errors->has($field_name))
        <div class="errors text-red-500">
            @component('components.validation-errors', ['field'=>$field_name])@endcomponent
        </div>
    @else
        <div class="text-[16px] font-semibold text-slate-500">
            @lang($section.'.'.$help)
        </div>
    @endif


</div>