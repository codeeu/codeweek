@extends('layout.new_base')

@section('content')

    <section id="codeweek-thankyou-report-page">
      <div class="relative codeweek-container-lg flex justify-center px-4 md:px-10 py-10 md:py-20">
          <div class="flex flex-col justify-center items-center text-center gap-4 max-w-[660px]">
            <div class="flex justify-center items-center w-16 h-16 bg-dark-blue rounded-full">
              <img class="w-6" src="/images/check-white.svg" />
            </div>

            <div class="text-dark-blue text-[22px] md:text-4xl font-semibold font-[Montserrat]">
              @lang('report.thanks_page.title')
            </div>

            <div class="flex flex-col gap-4 text-xl text-center font-[Blinker]">
              <div class="mb-6 md:mb-10">
                @lang('report.thanks_page.certificate_ready')
              </div>
              <div class="flex flex-col md:flex-row gap-4 md:gap-10">
                <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group" href="{{$event->path()}}">
                    <span>@lang('report.thanks_page.back_events')</span>
                </a>
                <a
                    class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-20 font-semibold text-base"
                    href="{{$event->certificate_url}}"
                >
                    Download
                </a>
              </div>
            </div>
          </div>
          </div>
        </div>

    </section>



@endsection