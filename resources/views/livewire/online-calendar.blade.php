<section class="bg-light-blue">
    <div class="py-10 flex md:justify-center codeweek-container">
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-fit">
            <div class="w-full md:w-[260px]">
                <label class="block text-default text-slate-500 mb-2" for="selectedDate">
                    Month
                </label>
                <div class="dropdown-datepicker relative">
                    <img src="/images/educational-resources/fi_calendar.svg" class="absolute top-1/2 left-4 -translate-y-1/2 z-10 pointer-events-none" />
                    <select
                        id="selectedDate"
                        wire:model.live="selectedDate"
                        class="w-full appearance-none rounded-full border border-slate-200 bg-white py-3 pl-12 pr-10 text-slate-500 font-semibold focus:outline-none focus:ring-2 focus:ring-[#1C4DA1]"
                    >
                        <option value="all">All months</option>
                        @foreach($months as $month)
                            <option value="{{ $month['id'] }}">{{ $month['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full md:w-[260px]">
                <label class="block text-default text-slate-500 mb-2" for="selectedLanguage">
                    Language
                </label>
                <select
                    id="selectedLanguage"
                    wire:model.live="selectedLanguage"
                    class="w-full appearance-none rounded-full border border-slate-200 bg-white py-3 px-4 text-slate-500 font-semibold focus:outline-none focus:ring-2 focus:ring-[#1C4DA1]"
                >
                    @foreach($languages as $language)
                        <option value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="relative w-full pt-10 md:pt-32">
        <div class="absolute top-0 w-full h-64 bg-yellow-50 md:hidden" style="clip-path: ellipse(100% 90% at 50% 90%)"></div>
        <div class="absolute top-0 w-full h-64 bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(75% 90% at 50% 90%)"></div>
        <div class="absolute top-0 w-full h-64 bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(70% 90% at 50% 90%)"></div>
        <div class="absolute top-0 w-full h-64 bg-yellow-50 hidden xl:block" style="clip-path: ellipse(65% 90% at 50% 90%)"></div>
        <div class="bg-yellow-50">
            <div class="codeweek-container-lg relative pt-10 pb-16 md:pb-28">
                <p class="text-center text-slate-500 text-lg mb-8">
                    Showing {{ $visibleCount }} of {{ $totalUpcoming }} upcoming open online activities
                    for {{ $monthLabel }}
                </p>
                @if(count($filteredEvents) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-10">
                        @foreach($filteredEvents as $event)
                            <div wire:key="event-{{ $event->id }}">
                                @include('online-calendar._oc-event-simple')
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        {{ $filteredEvents->links('vendor.pagination') }}
                    </div>
                @else
                    <p class="text-center text-slate-500 text-xl py-16">
                        @lang('snippets.no-featured-activities')
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>
