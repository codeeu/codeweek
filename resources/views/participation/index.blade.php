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
@endsection
