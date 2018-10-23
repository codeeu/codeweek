@extends('layout.base')

@section('content')
    <div class="container">

        <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
            <h1>@lang('report.title')</h1>
            <span>@lang('report.event_title'): {{$event->title}} ( {{$event->start_date}} )</span>
        </div>

        <hr>

        <header class="flex flex-col justify-between">

            <p class="mb-4 text-grey-dark">
                @lang('report.phrase1')
                <a href='mailto:info@codeweek.eu'>@lang('report.contactus')</a>
            </p>

            <p class="mb-4 text-grey-dark">
                @lang('report.phrase2')
            </p>

            <p class="mb-4 text-grey-dark">
                @lang('report.phrase3')
            </p>

        </header>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <form enctype="multipart/form-data" method="post" id="event" role="form"
                      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                      action="/event/report/{{$event->id}}">
                    {{csrf_field()}}
                    @component('components.report.form-field',['event'=>$event,'field_name'=>'participants_count','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                    @component('components.report.form-field',['event'=>$event,'field_name'=>'average_participant_age','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                    @component('components.report.form-field',['event'=>$event,'field_name'=>'percentage_of_females','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent

                    <div class="mb-8">
                        <div class="block text-grey-darkest text-3xl font-normal mb-2 font-bold" for="codeweek_for_all_participation_code">
                            @lang('report.codeweek_for_all_participation_code.label')
                        </div>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-dark mb-2 fborder-red border-2"
                               id="codeweek_for_all_participation_code" type="text" name="codeweek_for_all_participation_code" value="{{$event->codeweek_for_all_participation_code}}" readonly>

                    </div>

                    @component('components.report.form-field',['event'=>$event,'field_name'=>'name_for_certificate','type'=>'text','required'=>true,'help'=>'name_for_certificate.help'])@endcomponent

                    <p class="mb-4 text-grey-darkest">
                        @lang('report.phrase4')
                        <a href='mailto:info@codeweek.eu'>@lang('report.contactus')</a>
                    </p>


                    <div class="flex items-center justify-between mt-8">
                        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                                type="submit">
                            @lang('report.submit')
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection