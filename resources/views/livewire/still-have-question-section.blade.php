<section id="still-have-question-section">
    <div class="animation-section relative bg-[#F2FBFE]">
        <div class="relative z-10 codeweek-container-lg flex flex-col md:flex-row items-center py-20 gap-12">
            <div class="flex-1 flex flex-col items-start">
                <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-10 md:mb-6">
                    @lang('base.still_have_question')
                </h2>
                <div class="flex w-full md:w-auto">
                    @if(Route::current() && (Route::current()->getName() == 'community' || Route::current()->getName() == 'ambassadors'))
                    <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] w-full group" href="mailto:info@codeweek.eu">
                        <span>@lang('base.drop_a_line')</span>
                        <div class="flex gap-2 w-4 overflow-hidden">
                            <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                            <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                        </div>
                    </a>
                    @else
                    <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] w-full group" href="{{route('contact-us')}}">
                        <span>@lang('base.drop_a_line')</span>
                        <div class="flex gap-2 w-4 overflow-hidden">
                            <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                            <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            <div class="flex-1">
                <div class="inline-block observer-element relative">
                    <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/still-have-question.png" />
                    <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl" loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                </div>
            </div>
        </div>
        <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-40 -left-36 w-72 h-72 bg-[#99E1F4] rounded-full hidden md:block" style="transform: translate(-16px, -24px)"></div>
        <div class="animation-element move-background duration-[1.5s] absolute z-0 top-24 right-36 w-24 h-24 hidden md:block bg-[#99E1F4] rounded-full" style="transform: translate(-16px, -24px)"></div>
        <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-12 left-40 w-28 h-28 hidden md:block bg-[#99E1F4] rounded-full" style="transform: translate(-16px, -24px)"></div>
    </div>
</section>

@push('scripts')
<script type="text/javascript">
    triggerAnimations(document.getElementById('still-have-question-section'));
</script>
@endpush