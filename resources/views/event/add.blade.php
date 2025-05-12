@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Activities & Events', 'href' => '/'],
        (object) ['label' => 'Add activity', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-events-add-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-green-gradient pt-32 pb-0 md:py-20">
                <div
                    class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div
                        class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2
                                class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Add your Codeweek activity
                            </h2>
                            <p
                                class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                                illum dolore eu feugiat nulla facilisis at vero.
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10"></div>
                        <img class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden" loading="lazy"
                            src="/images/activity/banner.png" style="clip-path: ellipse(71% 73% at 40% 20%);" />
                        <img class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy" src="/images/activity/banner.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);" />
                    </div>
                </div>
            </div>
        </section>

        <activity-form
          token="{{ csrf_token() }}"
          :user="{{ auth()->user() }}"
          :themes='{{ $themes }}'
          :audiences='{{ $audiences }}'
          :leading-teachers="{{ json_encode($leading_teachers) }}"
          :languages="{{ json_encode($languages) }}"
          :countries="{{ $countries }}"
          :locale="'{{ App::getLocale() }}'"
          :location='@json($location ?? (object)[])'
          :privacy-link="'{{ route('privacy-contact-points') }}'"
        ></activity-form>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script>
        document.dispatchEvent(new CustomEvent('tinymce-ready'));
    </script>
@endpush
