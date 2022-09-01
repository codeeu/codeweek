@props([
'type' => 'label',
'slug' => '',
'colors' => [
'label' => 'bg-blue-200 text-gray-700',
'tag' => 'bg-blue-400 text-white'
]
])
<span {{$attributes->merge(['class' => "inline-block rounded-full px-3 py-1 text-sm font-semibold mx-1 my-1 {$colors[$type]}"])}}>
    <a class="text-white" href="{{route('events_map',['tag'=> "$slug"])}}">{{$slot}}</a>
    </span>
