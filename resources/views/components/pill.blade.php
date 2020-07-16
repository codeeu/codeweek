<!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
@props([
'type' => 'label',
'colors' => [
'label' => 'bg-orange-200 text-gray-700',
'tag' => 'bg-orange-400 text-white'
]
])
<span {{$attributes->merge(['class' => "inline-block rounded-full px-3 py-1 text-sm font-semibold mx-1 my-1 {$colors[$type]}"])}}>
      {{$slot}}
    </span>
