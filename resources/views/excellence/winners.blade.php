@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Excellence Winners', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-privacy-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat']">
                                Excellence Winners for {{$edition}}
                            </h2>
                        </div>

                        <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px]">
                            {{$total_reported}} events reported out of {{$total_events}} ({{number_format($percentage_reported,2)}}%)
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 py-10 md:py-20 codeweek-container-lg">
            <div class="flex gap-4 justify-end">
                <form action="{{route('excellence_excel')}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit"
                            class="bg-white flex text-nowrap justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                    >
                        <span>Download Excel</span>
                    </button>
                </form>
                <form action="#" method="get">
                    <input type="hidden" name="clear_cache" value="1"/>
                    <button type="submit"
                            class="bg-white flex text-nowrap justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                    >
                        <span>Clear Cache</span>
                    </button>
                </form>
            </div>
            <div class="overflow-hidden rounded-2xl border-2 border-[#B399D6] mt-6">
                <table class="w-full border-collapse">
                    <thead>
                    <tr class="bg-[#410098] text-white">
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Code</th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl"><a class="text-white" href="?participants={{request()->input('participants')==-1?1:-1}}"># Participants</a></th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl"><a class="text-white" href="?teachers={{request()->input('teachers')==-1?1:-1}}"># Teachers</a></th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl"><a class="text-white" href="?countries={{request()->input('countries')==-1?1:-1}}"># Countries</a></th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl"><a class="text-white" href="?activities={{request()->input('activities')==-1?1:-1}}"># Activities</a></th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl"><a class="text-white" href="?super={{request()->input('super')==-1?1:-1}}">Super winner</a></th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl"><a class="text-white" href="?reporting={{request()->input('reporting')==-1?1:-1}}">Reporting %</a></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    @if(!$details->isEmpty())
                        @foreach($details as $detail)
                            <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">
                                <a class="text-dark-blue" href="{{route('codeweek4all_details',['code'=>$detail->codeweek_for_all_participation_code])}}">{{$detail->codeweek_for_all_participation_code}}</a>
                            </td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{$detail->total_participants}}</td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{$detail->total_creators}}</td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{$detail->total_countries}}</td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{$detail->total_activities}}</td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{$detail->super_winner}}</td>
                            <td class="border-r border-[#B399D6] px-6 py-4 text-xl">{{number_format($detail->reporting_percentage,2)}}%</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
