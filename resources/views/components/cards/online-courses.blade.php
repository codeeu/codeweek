@props([
'bgColor' => '#FFF',
'url',
'title',
'img',
'date' ,
'description'
])
<div style="background-color:{{$bgColor}};" class="mb-6 md:mb-10 px-6 py-6 md:py-8 cursor-pointer" onclick="window.location.href='{{ $url }}'">
    <div class="flex flex-col-reverse lg:flex-row gap-6 lg:gap-10">
        <div class="flex-1 flex flex-col justify-center">
            <div class="w-fit px-4 py-1.5 bg-[#CCF0F9] rounded-full flex items-center mb-4 md:mb-6 gap-2">
                <img src="{{asset('images/educational-resources/fi_calendar.svg')}}" />
                <p class="text-slate-500 p-0 text-default font-semibold">{{$date}}</p>
            </div>
            <div class="font-['Montserrat'] text-dark-blue font-semibold text-[22px] leading-7 mb-4">{{$title}}</div>
            <p class="p-0 text-default leading-[22px]">
                {{$description}}
            </p>
        </div>
        <div class="flex justify-center relative">
            <img src="{{asset('/img/online-courses/'.$img)}}" class="w-full md:max-w-md rounded-lg" />
        </div>

    </div>

</div>