<tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
    <td class="border-r border-[#B399D6] px-6 py-4 text-xl">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-20 w-20">
                <img class="h-20 w-20 rounded"
                     src="{{$event->picture_path()}}"
                     alt="">
            </div>
            <div class="ml-4 text-slate-500">
                <div class="text-default leading-5 font-semibold text-gray-900">
                    <a class="text-dark-blue text-xl" href="{{$event->path()}}">{{$event->title}}</a>
                </div>

                <div class="text-default font-semibold leading-5 my-2">
                    {{$event->start_date}}
                </div>

                <div class="text-default leading-5 w-auto text-truncate">
                    {{ \Illuminate\Support\Str::limit($event->description, 200) }}
                </div>
            </div>
        </div>
    </td>
    <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
        @if($event->language)

            @foreach($event->languages as $language)
                <div class="w-fit px-4 py-1.5 bg-[#CCF0F9] rounded-full flex items-center gap-2">
                    <p class="text-slate-500 p-0 text-default font-semibold">{{ __("base.languages.{$language}") }}</p>
                    <button type="button" class="flex-shrink-0 ml-2 inline-flex text-black focus:outline-none focus:text-black" aria-label="Remove small badge" wire:click="clearLanguage()">
                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
                        </svg>
                    </button>
                </div>

                <div class="text-default leading-5 text-gray-500"></div>
            @endforeach
        @else
            <div>
                <div class="text-default leading-5 text-gray-500">Set language to</div>
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button" wire:click="setLanguage('{{$baseLanguage}}')"
                            class="inline-flex items-center px-1 py-1 border border-transparent text-default leading-4 font-medium rounded text-white bg-black hover:bg-black focus:outline-none focus:border-black focus:shadow-outline-indigo active:bg-black transition ease-in-out duration-150">
                        {{__("base.languages.{$baseLanguage}") }}
                    </button>
                    @if($baseLanguage !== 'en')
                        <button type="button" wire:click="setLanguage('en')"
                                class="inline-flex items-center ml-2 px-1 py-1 border border-transparent text-default leading-4 font-medium rounded text-white bg-black hover:bg-black focus:outline-none focus:border-black focus:shadow-outline-indigo active:bg-black transition ease-in-out duration-150">
                            {{ __("base.languages.en") }}
                        </button>
                    @endif
                </span>
            </div>
        @endif
    </td>
    <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
        <div class="leading-5 text-gray-900">{{$countryName}}</div>
    </td>
    <td class="px-6 py-4 font-normal text-xl" width="370">
        <div class="flex flex-col rounded-md gap-2">
            @if($event->highlighted_status !== 'FEATURED')
                <button
                    type="button"
                    class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                    wire:click="promote"
                >
                    <span>
                        @if($event->highlighted_status !== 'PROMOTED')
                            Promote
                        @else
                            Reject
                        @endif
                    </span>
                    <div class="flex w-4 gap-2 overflow-hidden">
                        <img src="/images/arrow-right-icon.svg"
                             class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                        <img src="/images/arrow-right-icon.svg"
                             class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                    </div>
                </button>
            @endif
            @can('feature',$event)
                @if($event->highlighted_status !== 'FEATURED')
                    <button
                        type="button"
                        class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                        wire:click="feature"
                    >
                        <span>Accept as Featured Activity</span>
                        <div class="flex w-4 gap-2 overflow-hidden">
                            <img src="/images/arrow-right-icon.svg"
                                 class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            <img src="/images/arrow-right-icon.svg"
                                 class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                        </div>
                    </button>
                @else
                    <button
                            type="button"
                            class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            wire:click="feature"
                    >
                        <span>Remove from Featured Activities</span>
                        <div class="flex w-4 gap-2 overflow-hidden">
                            <img src="/images/arrow-right-icon.svg"
                                 class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            <img src="/images/arrow-right-icon.svg"
                                 class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                        </div>
                    </button>
                @endif
            @endcan
        </div>
    </td>
</tr>

