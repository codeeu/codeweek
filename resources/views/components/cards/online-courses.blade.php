@props([
'bgColor' => '#DEEBF4',
'url',
'title',
'img',
'date' ,
'description'
])
<div style="background-color:{{$bgColor}}; line-height: 22px;" class="mt-8 p-8">

    <div class="flex flex-row">
        <div class="basis-1/2">
            <h2>
                <a href="{{$url}}">{{$title}}</a></h2>
            <div class="mt-2 pr-6">
                {{$description}}
            </div>
        </div>
        <div class="basis-1/2 relative">
            <a href="{{$url}}"><img
                        src="{{asset('/img/online-courses/'.$img)}}"
                         class="max-w-sm">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-black bg-opacity-50 text-white">
                    {{$date}}
                </div>
            </a>
        </div>

    </div>

</div>