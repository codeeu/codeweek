@php
    $author = $author ?? __('challenges-content.'.$slug.'.author')
@endphp

<div
  class="flex flex-col rounded-lg bg-white overflow-hidden cursor-pointer"
  onclick="window.location.href = '{{route('challenges.' . $slug)}}'"
>
    <div class="relative">
        <span class="w-full">
            <img src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}" class="w-full" />
        </span>
    </div>
    <div class="block flex-grow p-6 pt-8">
        <div class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat'] leading-6">
            {{__('challenges-content.'.$slug.'.title')}}
        </div>
        <p class="text-slate-500 text-default p-0 font-bold font-['Blinker']">
            {{ strip_tags($author) }}
        </p>
    </div>
</div>