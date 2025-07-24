@if($target==$targetParam)
    <a href="#" class="whitespace-no-wrap mr-8 py-4 px-1 border-b-2 border-dark-blue font-medium text-default leading-5 text-dark-blue focus:outline-none focus:text-dark-blue focus:border-dark-blue">
        {{$title}}
    </a>
@else
    <a href="{{route("{$route}")}}" class="whitespace-no-wrap mr-8 py-4 px-1 border-b-2 border-transparent font-medium text-default leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
        {{$title}}
    </a>
@endif