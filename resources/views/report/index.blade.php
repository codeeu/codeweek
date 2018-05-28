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
                        @component('components.report.form-field',['field_name'=>'codeweek_for_all_participation_code','type'=>'text','required'=>false,'help'=>'codeweek_for_all_participation_code.help'])@endcomponent
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