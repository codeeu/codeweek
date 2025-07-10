@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Report my activities', 'href' => '/events_to_report'],
      (object) ['label' => $event->title, 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section class="bg-light-blue font-['Blinker']">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">
                            @lang('report.title')
                        </h2>
                        <p class="text-2xl font-normal text-white p-0 max-md:max-w-full max-w-[864px] mb-0">
                            @lang('report.event_title'): {{$event->title}} ( {{$event->start_date}} )
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 tablet:py-20 bg-white">
            <div class="codeweek-container">
                <p class="text-base leading-[1.4] tablet:text-2xl font-normal text-slate-600 p-0 mb-6">
                    @lang('report.phrase1') <a class="text-dark-blue underline font-semibold" href='mailto:info@codeweek.eu'>@lang('report.contactus')</a>
                </p>
                <p class="text-default leading-[1.4] tablet:text-xl font-normal text-slate-500 p-0 mb-0">
                    @lang('report.phrase2')
                    @lang('report.phrase3')
                </p>
            </div>
        </section>

        <section class="py-10 tablet:py-20 bg-yellow-50">
            <div class="codeweek-container">
                <h2 class="text-dark-blue text-2xl font-medium tablet:text-4xl font-['Montserrat'] mb-6 tablet:mb-10">
                    Your report
                </h2>
                <div class="bg-white px-5 py-8 rounded-xl tablet:px-24 tablet:py-16 tablet:rounded-3xl">
                    <form enctype="multipart/form-data" method="post" id="event" role="form"
                          action="/event/report/{{$event->id}}">
                        {{csrf_field()}}
                        <div>
                            @component('components.report.form-field',['event'=>$event,'field_name'=>'participants_count','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                            @component('components.report.form-field',['event'=>$event,'field_name'=>'average_participant_age','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                            @component('components.report.form-field',['event'=>$event,'field_name'=>'percentage_of_females','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                            <div>
                                <div>
                                    <label class="block text-xl text-slate-500 mb-2" for="id_title">@lang('report.codeweek_for_all_participation_code.label')</label>
                                    <input id="codeweek_for_all_participation_code" type="text"
                                           name="codeweek_for_all_participation_code"
                                           class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                           value="{{$event->codeweek_for_all_participation_code}}" readonly>
                                </div>
                                <div class="errors">
                                    @component('components.validation-errors', ['field'=>'codeweek_for_all_participation_code'])@endcomponent
                                </div>
                            </div>

                            @component('components.report.form-field',['event'=>$event,'field_name'=>'name_for_certificate','type'=>'text','required'=>true,'help'=>'name_for_certificate.help'])@endcomponent

                            <div class="bg-[#F2FBFE] p-4 flex items-center gap-2 text-default">
                                <img class="min-w-6 min-h-6" src="/images/icon_info.svg" />
                                <div>
                                    @lang('report.phrase4')
                                    <a href='mailto:info@codeweek.eu' class="text-dark-blue underline font-semibold">@lang('report.contactus')</a>.
                                </div>
                            </div>

                            <div class="flex justify-center mt-8">
                                <input class="cursor-pointer text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-20 font-semibold text-base" type="submit" value="@lang('report.submit')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection
