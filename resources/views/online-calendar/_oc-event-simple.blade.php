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

        <div class="text-sm leading-5 text-gray-500">{{$event->language ?  __("base.languages.{$event->language}") : "N/A"}}</div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">

                {{$event->highlighted_status}}

              </span>
    </td>

</tr>