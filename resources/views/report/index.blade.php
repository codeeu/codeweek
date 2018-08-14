@extends('layout.base')

@section('content')
    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">
            <h3>@lang('report.title')</h3>
            <header class="flex flex-col justify-between">
                <p class="mb-4 text-grey-dark">
                    @lang('Event title'): {{$event->title}} ( {{$event->start_date}} )</p>

                <p class="mb-4 text-grey-dark">
                    @lang("You can fill this form only once! Please check your data carefully. If you make a mistake, <a href='mailto:info@codeweek.eu'>contact us</a>.")
                </p>

                <p class="mb-4 text-grey-dark">@lang('After submitting the report, a personalized certificate for participation in Code Week will be issued automatically and will become available for you to download or share. You can see an example certificate here.')</p>

                <p class="mb-4 text-grey-dark">@lang('Required fields are marked with an * asterisk.')</p>

            </header>
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <form enctype="multipart/form-data" method="post" id="event" role="form"
                          class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                          action="/event/report/{{$event->id}}">
                        {{csrf_field()}}
                        @component('components.report.form-field',['field_name'=>'participants_count','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                        @component('components.report.form-field',['field_name'=>'average_participant_age','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent
                        @component('components.report.form-field',['field_name'=>'percentage_of_females','type'=>'number','required'=>true,'help'=>'number_required'])@endcomponent

                        <div class="mb-8">
                            <div class="block text-grey-darkest text-3xl font-normal mb-2 font-bold" for="codeweek_for_all_participation_code">
                                @lang('report.codeweek_for_all_participation_code.label')
                            </div>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-dark mb-2 fborder-red border-2"
                                   id="codeweek_for_all_participation_code" type="text" name="codeweek_for_all_participation_code" value="{{$event->codeweek_for_all_participation_code}}" readonly>
                                @lang('report.codeweek_for_all_participation_code.help')
                        </div>

                        @component('components.report.form-field',['field_name'=>'name_for_certificate','type'=>'text','required'=>true,'help'=>'name_for_certificate.help'])@endcomponent


                        <p class="mb-4 text-grey-darkest">
                            @lang('You can fill this form only once! Please check your data carefully. If you make a mistake, contact us.')
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
    </div>
@endsection