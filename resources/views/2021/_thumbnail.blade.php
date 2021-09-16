
<div class="shadow-xl">
    <a href="{{route('challenges.' . $slug)}}">
        <img src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}">
        <div class="orange pt-2 pl-2 bg-gray-100 text-xl">{{__('challenges.content.'.$slug.'.title')}}</div>
        <div class="text-black pl-2 pb-2 bg-gray-100 text-base italic">{{__('challenges.content.'.$slug.'.author')}}</div>
    </a>
</div>
