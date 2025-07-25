
<section class="bg-light-blue">
    <div class="py-10 flex md:justify-center codeweek-container">
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-fit">
            <div class="w-full md:w-[260px]">
                <label class="block text-default text-slate-500 mb-2" for="selectedDate">
                    Month
                </label>
                <div class="dropdown-datepicker relative">
                    <img src="/images/educational-resources/fi_calendar.svg" class="absolute top-1/2 left-4 -translate-y-1/2 z-[999]" />
                    <select-field
                        wire:model.live="selectedDate"
                        v-model="selectedDate"
                        placeholder="Select month"
                        :options="{{ json_encode($months) }}"
                    ></select-field>
                </div>
            </div>
            <div class="w-full md:w-[260px]">
                <label class="block text-default text-slate-500 mb-2" for="language">
                    Language
                </label>
                <select-field
                    wire:model.live="selectedLanguage"
                    v-model="selectedLanguage"
                    placeholder="Select language"
                    :options="{{ json_encode($languages) }}"
                ></select-field>
            </div>
        </div>
    </div>

    <section class="relative w-full pt-10 md:pt-32">
        <div class="absolute top-0 w-full h-64 bg-yellow-50 md:hidden" style="clip-path: ellipse(100% 90% at 50% 90%)" ></div>
        <div class="absolute top-0 w-full h-64 bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(75% 90% at 50% 90%)" ></div>
        <div class="absolute top-0 w-full h-64 bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(70% 90% at 50% 90%)" ></div>
        <div class="absolute top-0 w-full h-64 bg-yellow-50 hidden xl:block" style="clip-path: ellipse(65% 90% at 50% 90%)" ></div>
        <div class="bg-yellow-50">
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                @if(count($filteredEvents) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-10">
                        @foreach($filteredEvents as $event)
                            @include('online-calendar._oc-event-simple')
                        @endforeach
                    </div>
                    <div>
                        {{ $filteredEvents->links('vendor.pagination') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
