@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>@lang('participation.title')</h1>
            <p>@lang('participation.phrase1')</p>
        </section>

        <section class="codeweek-content-wrapper" style="margin-top:0px;">

            <form method="POST" id="event" role="form" enctype="multipart/form-data"
                  action="/participation" class="codeweek-form">

                {{csrf_field()}}

                <div class="codeweek-form-inner-container">

                    @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'names','type'=>'text','required'=>true,'help'=>'names.help'])@endcomponent
                    @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'event_name','type'=>'text','required'=>true,'help'=>'event_name.help'])@endcomponent
                    @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'event_date','type'=>'text','required'=>true,'help'=>'event_date.help'])@endcomponent

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('participation.submit')">
                        </div>
                    </div>

                </div>

            </form>

        </section>

    </section>



    {{--<div class="container">

        <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
            <h1>@lang('participation.title')</h1>

        </div>

        <hr>

        <header class="flex flex-col justify-between">

            <p class="mb-4 text-grey-dark">
                @lang('participation.phrase1')
            </p>

        </header>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <form enctype="multipart/form-data" method="post" id="event" role="form"
                      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                      action="/participation">
                    {{csrf_field()}}

                    @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'names','type'=>'text','required'=>true,'help'=>'names.help'])@endcomponent
                    @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'event_name','type'=>'text','required'=>true,'help'=>'event_name.help'])@endcomponent
                    @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'event_date','type'=>'text','required'=>true,'help'=>'event_date.help'])@endcomponent


                    <div class="flex items-center justify-between mt-8">
                        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                                type="submit">
                            @lang('participation.submit')
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </div>--}}
@endsection