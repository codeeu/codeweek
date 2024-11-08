@extends('layout.base')

@section('content')

<section id="codeweek-partners-page" class="codeweek-page">

        <!-- Partners Page Banner -->
        <section class="relative flex justify-center mx-auto codeweek-banner about">
            <div class="max-w-[1080px] absolute flex-col w-full h-full flex justify-center mx-auto">
                <h2 class="max-w-[600px] font-bold leading-none text-white max-md:max-w-full max-md:text-6xl">
                    Partners and Sponsors
                </h2>
                <p class="max-w-[600px] text-base font-bold leading-6 text-white max-md:max-w-full">
                    These are our partners and sponsors.
                </p>
            </div>
            <div class="w-full">
                <img src="/images/partners/partners.png" class="w-full mr-0 static-image">
            </div>
        </section>

      <!-- Filter Navigation -->
        <section class="flex flex-col justify-center px-24 pt-16 font-bold text-center max-md:px-5">
            <div class="flex flex-col items-center w-full max-md:max-w-full">
                <h2 class="text-4xl leading-tight text-orange-500">Our Partners</h2>
                <nav class="flex flex-wrap gap-2.5 justify-center items-start px-2.5 py-2 mt-5 text-base text-black rounded-[32px] max-md:max-w-full">
                    <a href="{{ route('partners.index', ['category' => 'Partners']) }}" class="gap-2.5 self-stretch px-6 py-3 {{ $selectedCategory == 'Partners' ? 'text-white bg-blue-900' : 'bg-slate-200' }} hover: rounded-3xl max-md:px-5">Partners</a>
                    <a href="{{ route('partners.index', ['category' => 'Council Presidency']) }}" class="gap-2.5 self-stretch px-6 py-3 {{ $selectedCategory == 'Council Presidency' ? 'text-white bg-blue-900' : 'bg-slate-200' }} hover:bg-primary hover:text-white  rounded-3xl max-md:px-5">Council Presidency</a>
                    <a href="{{ route('partners.index', ['category' => 'EU Code Week Supporters']) }}" class="gap-2.5 self-stretch px-6 py-3 {{ $selectedCategory == 'EU Code Week Supporters' ? 'text-white bg-blue-900' : 'bg-slate-200' }} hover:bg-primary hover:text-white  rounded-3xl max-md:px-5">EU Code Week Supporters</a>
                    <a href="{{ route('partners.index', ['category' => 'Optional Additional Link']) }}" class="gap-2.5 self-stretch px-6 py-3 {{ $selectedCategory == 'Optional Additional Link' ? 'text-white bg-blue-900' : 'bg-slate-200' }} hover:bg-primary hover:text-white rounded-3xl max-md:px-5">Optional Additional Link</a>
            </div>
        </section>
        <!-- Partner Logos -->
        <section class="px-6 pt-16 pb-16 md:px-24">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($partners as $partner)
                    <div class="flex justify-center items-center bg-white rounded-md border border-zinc-100 min-h-[160px] cursor-pointer">
                        <img loading="lazy" src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="object-contain w-[140px] h-auto" />
                    </div>
                @endforeach
            </div>

            <!-- Custom Pagination -->
            @if ($partners->hasPages())
                <section class="flex flex-col justify-center px-24 pt-16 max-md:px-5">
                    <div class="flex flex-row items-center justify-center w-full gap-8 max-md:max-w-full">
                        <nav class="flex gap-2.5 items-center self-stretch my-auto text-base font-bold text-center text-black whitespace-nowrap" aria-label="Page navigation">
                             {{ $partners->links('pagination::custom') }}
                        </nav>
                    </div>
                </section>
            @endif
        </section>
  
        <partner-gallery></partner-gallery>

@endsection

