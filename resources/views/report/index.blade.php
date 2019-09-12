@extends('layout.base')

@section('content')

    <section id="codeweek-report-event-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>@lang('report.title')</h1>
            <p>@lang('report.event_title'): {{$event->title}} ( {{$event->start_date}} )</p>

            <p>
                @lang('report.phrase1')
                <a href='mailto:info@codeweek.eu'>@lang('report.contactus')</a>
            </p>

            <p>
                @lang('report.phrase2')
            </p>

            <p>
                @lang('report.phrase3')
            </p>

        </section>


        <section class="codeweek-content-wrapper" style="margin-top:0;">

            <form enctype="multipart/form-data" method="post" id="event" role="form"
                  class="codeweek-form" action="/event/report/{{$event->id}}">
                {{csrf_field()}}

                <div class="codeweek-form-inner-container">

                    @component('components.report.form-field',['event'=>$event,'field_name'=>'participants_count','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                    @component('components.report.form-field',['event'=>$event,'field_name'=>'average_participant_age','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                    @component('components.report.form-field',['event'=>$event,'field_name'=>'percentage_of_females','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_title">@lang('report.codeweek_for_all_participation_code.label')</label>
                            <input id="codeweek_for_all_participation_code" type="text"
                                   name="codeweek_for_all_participation_code"
                                   value="{{$event->codeweek_for_all_participation_code}}" readonly>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'codeweek_for_all_participation_code'])@endcomponent
                        </div>
                    </div>

                    @component('components.report.form-field',['event'=>$event,'field_name'=>'name_for_certificate','type'=>'text','required'=>true,'help'=>'name_for_certificate.help'])@endcomponent

                    <p style="color: red;text-align: center;margin-top: 20px;">
                        @lang('report.phrase4')
                        <a href='mailto:info@codeweek.eu'>@lang('report.contactus')</a>
                    </p>

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('report.submit')">
                        </div>
                    </div>

                </div>

            </form>

        </section>

    </section>

@endsection
