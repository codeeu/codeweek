<!-- Completed Step -->
<div x-data="{ tooltip: false }" class="z-30 inline-flex">
    <div class="absolute inset-0 flex items-center"
         aria-hidden="true"
         x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
        <div class="h-0.5 w-full bg-gray-400"></div>
    </div>
    <span
       class="group relative w-24 h-24 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full hover:border-blue-400"
       x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
        <img class="filter grayscale blur-sm"
             src="{{asset('badges/'.$achievement->icon)}}">
        <span class="sr-only">{{$achievement->name}}</span>
    </span>
    <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
        <div class="absolute top-0 z-10 w-32 p-2 -mt-1 text-sm leading-tight text-white transform -translate-x-1/2 -translate-y-full bg-blue-500 rounded-lg shadow-lg">
            {{$achievement->description()}}
        </div>
        <svg class="absolute z-10 w-6 h-6 text-blue-500 transform -translate-x-12 -translate-y-3 fill-current stroke-current"
             width="8" height="8">
            <rect x="12" y="-10" width="8" height="8" transform="rotate(45)"/>
        </svg>
    </div>
</div>