<tr>
    <td class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded"
                     src="{{$event->picture_path()}}"
                     alt="">
            </div>
            <div class="ml-4">
                <div class="text-sm leading-5 text-orange-600">
                    {{$event->start_date}}
                </div>

                <div class="text-sm leading-5 font-medium text-gray-900">
                    <a href="{{$event->path()}}">{{$event->title}}</a>
                </div>

                <div class="text-xs leading-5 text-gray-500 w-auto text-truncate">
                    {{ \Illuminate\Support\Str::limit($event->description, 200) }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        @if($event->language)

            @foreach($event->languages as $language)
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800">
                    {{ __("base.languages.{$language}") }}
                    <button type="button" class="flex-shrink-0 ml-2 inline-flex text-indigo-500 focus:outline-none focus:text-indigo-700" aria-label="Remove small badge" wire:click="clearLanguage()">
                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
                        </svg>
                    </button>
                </span>

                <div class="text-sm leading-5 text-gray-500">


                </div>
            @endforeach
        @else
            <div>

                <div class="text-sm leading-5 text-gray-500">Set language to</div>
                <span class="inline-flex rounded-md shadow-sm">


  <button type="button" wire:click="setLanguage('{{$baseLanguage}}')"
          class="inline-flex items-center px-1 py-1 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
     {{__("base.languages.{$baseLanguage}") }}
  </button>
@if($baseLanguage !== 'en')
                        <button type="button" wire:click="setLanguage('en')"
                                class="inline-flex items-center ml-2 px-1 py-1 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
    {{ __("base.languages.en") }}
  </button>
                    @endif
</span>
            </div>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

        <div class="text-sm leading-5 text-gray-900">{{$countryName}}</div>


    </td>
{{--    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">--}}
{{--              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">--}}
{{--                {{$event->highlighted_status == 'PROMOTED'}}--}}
{{--              </span>--}}
{{--    </td>--}}
    <td class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium">
        {{--        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
        <span class="inline-flex rounded-md shadow-sm">
  @if($event->highlighted_status !== 'FEATURED')
                <button type="button"
                        class="inline-flex items-center px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                        wire:click="promote"
                >
    @if($event->highlighted_status !== 'PROMOTED')
                        Promote
                    @else
                        Reject
                    @endif
                    @endif

  </button>
                @can('feature',$event)


                    @if($event->highlighted_status !== 'FEATURED')
                        <button type="button"
                                class="inline-flex items-center ml-2 px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                                wire:click="feature"
                        >
                            Accept as Featured Activity
                        </button>
                                                @else
                        <button type="button"
                                class="inline-flex items-center ml-2 px-2 py-2 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150"
                                wire:click="feature"
                        >
                                                    Remove from Featured Activities
                                                @endif
                    @endcan





</span>

    </td>
</tr>

