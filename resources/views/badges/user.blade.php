@extends('layout.new_base')

<x-tailwind></x-tailwind>
<x-alpine></x-alpine>

@php
    $list = [
        (object) ['label' => 'My Badges', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-my-badge-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative z-10 py-10 md:py-20 codeweek-container">
            <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">Badges</p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Name:</span> {{$user->fullName}}
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Leading Teacher Tag:</span> {{$user->tag}}
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Bits earned in {{$year}}:</span> {{$user->getPoints($year)}}
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Reported events for {{$year}}:</span> {{$user->reported($year)}}
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Influencer Bits for {{$year}}:</span> {{$user->influence($year)}}
            </p>
            <div class="mb-4">
                <p id="header-1" class="font-semibold p-0 mb-2 text-lg md:text-2xl text-dark-blue">
                    Organiser Badges
                </p>
                <div class="flex">
                    <div class="flex-none">
                        <img class="w-5/6 shadow-lg rounded-lg" src="{{asset('badges/organiser/organiser_logo.png')}}">
                    </div>
                    <div class="flex-1">
                        <p class="font-normal italic text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">Go from active to legendary organiser, by organising more Code Week activities and contributing to the map.</p>
                        <div class="pt-6">
                            <nav>
                                <ol class="list-decimal m-0 ml-4 pl-2">
                                    @foreach($organiserBadges as $achievement)
                                        @if(!$loop->last)
                                            <li class="relative font-normal text-default md:text-xl p-0 text-slate-500 pr-8 sm:pr-20">
                                        @else
                                            <li class="relative font-normal text-default md:text-xl p-0 text-slate-500">
                                        @endif
                                                @if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all()))
                                                    <x-badges.completed :achievement="$achievement"></x-badges.completed>
                                                @else
                                                    <x-badges.locked :achievement="$achievement"></x-badges.locked>
                                                @endif
                                            </li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <p id="header-1" class="font-semibold p-0 mb-2 text-lg md:text-2xl text-dark-blue">
                    Influencer Badges
                </p>
                <div class="flex">
                    <div class="flex-none">
                        <img class="w-5/6 shadow-lg rounded-lg" src="{{asset('badges/influencer/influencer_logo.png')}}">
                    </div>
                    <div class="flex-1">
                        <p class="font-normal italic text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                            Go from influencer to legendary influencer, and earn your place in the record books of Code Week legends. Increase your points by using the Code Week Tag when organising and sharing an activity.
                        </p>
                        <div class="pt-6">
                            <nav>
                                <ol class="list-decimal m-0 ml-4 pl-2">
                                    @foreach($influencerBadges as $achievement)
                                        @if(!$loop->last)
                                            <li class="relative font-normal text-default md:text-xl p-0 text-slate-500 pr-8 sm:pr-20">
                                        @else
                                            <li class="relative font-normal text-default md:text-xl p-0 text-slate-500">
                                                @endif
                                                @if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all()))
                                                    <x-badges.completed :achievement="$achievement"></x-badges.completed>
                                                @else
                                                    <x-badges.locked :achievement="$achievement"></x-badges.locked>
                                                @endif
                                            </li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
