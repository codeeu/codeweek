<div class="flex flex-col bg-white rounded-lg overflow-hidden">
    <div class="flex-shrink-0">
      <img src="{{$event->picture_path()}}" class="w-full object-cover aspect-[1.5]" />
    </div>

    <div class="flex-grow flex flex-col gap-2 px-6 py-4">
        <div class="text-dark-blue font-semibold font-['Montserrat'] text-base leading-6">
          {{ $event->title }}
        </div>

        <div class="text-slate-500 text-[16px] leading-[22px] font-semibold">
          {{$event->get_start_date_simple()}}
        </div>

        <div class="flex gap-2 flex-wrap mb-2">
            @if($event->language)
                @foreach($event->languages as $language)
                    <span class="flex items-center gap-2 py-1 px-3 text-sm font-semibold rounded-full whitespace-nowrap leading-4 bg-light-blue-100 text-slate-500">
                        {{__("base.languages.{$language}")}}
                    </span>
                @endforeach
            @endif
        </div>


        <div class="flex-grow text-slate-500 text-[16px] leading-[22px] mb-2 [&_p]:p-0">
            {!! $event->description !!}
        </div>

        <div>
          <a
              class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
              href="{{$event->path()}}"
            >
              <span>{{ __('myevents.view') }}</span>
              <div class="flex gap-2 w-4 overflow-hidden">
                <img
                  src="/images/arrow-right-icon.svg"
                  class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0 text-[#1C4DA1]"
                />
                <img
                  src="/images/arrow-right-icon.svg"
                  class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0 text-[#1C4DA1]"
                />
              </div>
            </a>
        </div>
    </div>
</div>







