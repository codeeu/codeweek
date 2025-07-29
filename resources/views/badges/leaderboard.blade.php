@extends('layout.new_base')

<x-tailwind></x-tailwind>

@php
    $list = [
        (object) ['label' => 'Badges Leaderboard', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')

    <section id="codeweek-privacy-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-28">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex items-center gap-6">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat']">
                            Badges Leaderboard for
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 py-10 md:py-20 codeweek-container-lg">
            <form class="relative w-40" id="faceted-search-events" method="get" action="/badges/leaderboard"
                  enctype="multipart/form-data">
                <select id="year" name="year" onchange="this.form.submit()" class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none">
                    @foreach($years as $year_label)
                        <option value="{{$year_label}}" {{ ($year_label == $year)?'selected':'' }} >
                            {{$year_label}}
                        </option>
                    @endforeach
                </select>
                <div
                    class="cursor-pointer absolute top-1/2 right-4 -translate-y-1/2"
                >
                    <img src="/images/select-arrow.svg" />
                </div>
            </form>
            <div class="overflow-hidden rounded-2xl border-2 border-[#B399D6] mt-6">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-50">
                    <tr class="bg-[#410098] text-white">
                        <th scope="col"
                            class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Rank
                        </th>
                        <th scope="col"
                            class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Name
                        </th>
                        <th scope="col"
                            class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Points
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <!-- Odd row -->
                    @foreach($users as $user)
                        <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{ $rank++}}</td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl"><a class="text-dark-blue"
                                        href="/badges/user/{{$user->id}}/{{$year}}">{{$user->fullName}}</a>
                            </td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{$user->getPoints($year)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="mt-5">
                {{ $users->links('vendor.pagination') }}
            </div>
        </section>
    </section>

@endsection
