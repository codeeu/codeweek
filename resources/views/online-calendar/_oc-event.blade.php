<tr>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded"
                     src="{{$event->picture_path()}}"
                     alt="">
            </div>
            <div class="ml-4">
                <div class="text-sm leading-5 font-medium text-gray-900">
                    <a href="{{$event->path()}}">{{$event->title}}</a>
                </div>
                <div class="text-sm leading-5 text-gray-500">
                    {{$event->start_date}}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

        <div class="text-sm leading-5 text-gray-900">{{$countryNames[$event->country_iso]}}</div>

        @if($event->language)
            @foreach($event->languages as $language)
                <div class="text-sm leading-5 text-gray-500">
                    {{ __("base.languages.{$language}") }}
                </div>
            @endforeach
        @else
            <div class="text-sm leading-5 text-gray-500">N/A</div>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">

                {{$event->highlighted_status}}

              </span>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium">
        {{--        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
        <span class="inline-flex rounded-md shadow-sm">
  <button type="button"
          class="inline-flex items-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
    Promote
  </button>
</span>

    </td>
</tr>