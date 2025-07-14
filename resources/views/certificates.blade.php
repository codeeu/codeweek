@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'My certificates', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')

<section class="bg-light-blue">
    <section class="relative flex overflow-hidden">
        <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
            <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                <div class="codeweek-container-lg flex flex-col">
                    <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">
                        @lang('certificates.certificates_for'){{ Auth::user()->fullName }}
                    </h2>
                    <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px]">
                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 tablet:py-20 bg-yellow-50 font-[Blinker]">
        <div class="codeweek-container">
            <h2 class="text-dark-blue text-2xl font-medium tablet:text-4xl font-['Montserrat'] mb-6 tablet:mb-8">
                Certificates
            </h2>
            @if($reported_events->isEmpty() && $excellence->isEmpty() && $participation->isEmpty())
                <p class="text-slate-500 font-normal text-lg p-0">@lang('certificates.no_certificates')</p>
            @else
                <div class="overflow-hidden rounded-lg border-2 border-[#B399D6] hidden tablet:block">
                    <table class="w-full border-collapse">
                        <thead>
                        <tr class="bg-[#410098] text-white">
                            <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Type</th>
                            <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Activity</th>
                            <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Date</th>
                            <th class="px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$participation->isEmpty())
                            @foreach($participation as $certificate_of_participation)
                                @if(!is_null($certificate_of_participation->event_name))
                                    <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
                                            <span class="text-slate-500 font-semibold">Participation</span>
                                        </td>
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                            {{$certificate_of_participation->activity_type}}
                                        </td>
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                            {{$certificate_of_participation->event_date}}
                                        </td>
                                        <td class="flex px-6 py-4 font-normal text-xl actions">
                                            @if(!empty($certificate_of_participation->participation_url))
                                                <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                                href="{{$certificate_of_participation->participation_url}}">
                                                    Download
                                                </a>
                                            @else
                                                @if($certificate_of_participation->status == 'FAILED' ||$certificate_of_participation->status == 'ERROR')
                                                    Error with encoding.
                                                @else
                                                    Processing ...
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif

                        @if(!$excellence->isEmpty())
                            @foreach($excellence as $certificate_of_excellence)
                                @if(!is_null($certificate_of_excellence->name_for_certificate))
                                    <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
                                            <span class="text-slate-500 font-semibold">Excellence</span>
                                        </td>
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                            {{$certificate_of_excellence->activity_type}}
                                        </td>
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                            {{$certificate_of_excellence->event_date}}
                                        </td>
                                        <td class="flex px-6 py-4 font-normal text-xl actions">
                                            <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                            href="{{$certificate_of_excellence->certificate_url}}">
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                                        <td colspan="4" class="px-6 py-4 font-normal text-xl">
                                            <a class="text-[#1C4DA1] font-semibold" href="{{route('certificate_excellence_report', ['edition'=>$certificate_of_excellence->edition])}}">
                                                Claim your certificate of excellence for {{$certificate_of_excellence->edition}}
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif

                        @if(!$superOrganiser->isEmpty())
                            @foreach($superOrganiser as $super_organiser_certificate)
                                @if(!is_null($super_organiser_certificate->name_for_certificate))
                                    <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
                                            <span class="text-slate-500 font-semibold">Super Organiser</span>
                                        </td>
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                            {{$super_organiser_certificate->activity_type}}
                                        </td>
                                        <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                            {{$super_organiser_certificate->event_date}}
                                        </td>
                                        <td class="flex px-6 py-4 font-normal text-xl actions">
                                            <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                            href="{{$super_organiser_certificate->certificate_url}}">
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                                        <td colspan="4" class="px-6 py-4 font-normal text-xl">
                                            <a class="text-[#1C4DA1] font-semibold" href="{{route('certificate_super_organiser_report', ['edition'=>$super_organiser_certificate->edition])}}">
                                                Claim your Super Organiser certificate for {{$super_organiser_certificate->edition}}
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif

                        @if(!$reported_events->isEmpty())
                            @foreach($reported_events as $event)
                                <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                                    <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
                                        <span class="text-slate-500 font-semibold">Reported</span>
                                    </td>
                                    <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">
                                        {{$event->activity_type}}
                                    </td>
                                    <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">{{$event->event_date}}</td>
                                    <td class="flex gap-4 px-6 py-4 font-normal text-xl actions">
                                        <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                        href="{{$event->certificate_url}}">
                                            Download
                                        </a>
                                        <a title="Edit your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                        href="{{route('report_event',$event->id)}}">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <div class="tablet:hidden flex flex-col gap-y-6">
                    @if(!$participation->isEmpty())
                        @foreach($participation as $certificate_of_participation)
                            @if(!is_null($certificate_of_participation->event_name))
                                <div class="border-2 border-[#B399D6] rounded-lg overflow-hidden">
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Type
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] text-xl flex-1">
                                            Participation
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Activity
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] text-xl flex-1">
                                            {{$certificate_of_participation->activity_type}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Date
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 font-normal text-xl">
                                            {{$certificate_of_participation->event_date}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Actions
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-[#B399D6] text-xl font-normal flex-1">
                                            @if(!empty($certificate_of_participation->participation_url))
                                                <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                                   href="{{$certificate_of_participation->participation_url}}">
                                                    Download
                                                </a>
                                            @else
                                                @if($certificate_of_participation->status == 'FAILED' ||$certificate_of_participation->status == 'ERROR')
                                                    Error with encoding.
                                                @else
                                                    Processing ...
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                    @if(!$excellence->isEmpty())
                        @foreach($excellence as $certificate_of_excellence)
                            @if(!is_null($certificate_of_excellence->name_for_certificate))
                                <div class="border-2 border-[#B399D6] rounded-lg overflow-hidden">
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Type
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 text-xl">
                                            Excellence
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Activity
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 text-xl">
                                            {{$certificate_of_excellence->activity_type}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Date
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 font-normal text-xl">
                                            {{$certificate_of_excellence->event_date}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Actions
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-[#B399D6] font-normal flex-1">
                                            <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                               href="{{$certificate_of_excellence->certificate_url}}">
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} font-normal text-xl border-2 border-[#B399D6] rounded-lg overflow-hidden">
                                    <a class="text-[#1C4DA1] font-semibold" href="{{route('certificate_excellence_report', ['edition'=>$certificate_of_excellence->edition])}}">
                                        Claim your certificate of excellence for {{$certificate_of_excellence->edition}}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif

                    @if(!$superOrganiser->isEmpty())
                        @foreach($superOrganiser as $super_organiser_certificate)
                            @if(!is_null($super_organiser_certificate->name_for_certificate))
                                <div class="border-2 border-[#B399D6] rounded-lg overflow-hidden">
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Type
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 text-xl">
                                            Super Organiser
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Activity
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 text-xl">
                                            {{$super_organiser_certificate->activity_type}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Date
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 font-normal text-xl">
                                            {{$super_organiser_certificate->event_date}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                            Actions
                                        </div>
                                        <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-[#B399D6] font-normal flex-1 text-xl">
                                            <a title="Download your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                               href="{{$super_organiser_certificate->certificate_url}}">
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} font-normal text-xl border-2 border-[#B399D6] rounded-lg overflow-hidden">
                                    <a class="text-[#1C4DA1] font-semibold" href="{{route('certificate_super_organiser_report', ['edition'=>$super_organiser_certificate->edition])}}">
                                        Claim your Super Organiser certificate for {{$super_organiser_certificate->edition}}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif

                    @if(!$reported_events->isEmpty())
                        @foreach($reported_events as $event)
                            <div class="border-2 border-[#B399D6] rounded-lg overflow-hidden">
                                <div class="flex">
                                    <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                        Type
                                    </div>
                                    <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 text-xl">
                                        Reported
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                        Activity
                                    </div>
                                    <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 text-xl">
                                        {{$event->activity_type}}
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                        Date
                                    </div>
                                    <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 font-normal text-xl">
                                        {{$event->event_date}}
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                        Actions
                                    </div>
                                    <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-[#B399D6] font-normal flex-1 text-xl">
                                        <a title="Edit your certificate" class="mb-3 flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                           href="{{$event->certificate_url}}">
                                            Download
                                        </a>
                                        <a title="Edit your certificate" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                           href="{{route('report_event',$event->id)}}">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </section>
</section>

<script>
    setTimeout(function () {
        window.location.reload(1);
    }, 20000);
</script>
@endsection
