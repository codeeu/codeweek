@extends('layout.base')

@section('content')

    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>@lang('super-organiser.title') {{$edition}}</h1>
            <p>@lang('super-organiser.required')</p>
        </section>

        <section class="codeweek-content-wrapper" style="margin-top:0px;">

            <form method="POST" id="event" role="form" enctype="multipart/form-data"
                  action="/certificates/super-organiser/{{$edition}}" class="codeweek-form">

                {{csrf_field()}}

                <div class="codeweek-form-inner-container">

                    @component('components.report.form-field-simple',['section'=>'super-organiser','field_name'=>'name_for_certificate','type'=>'text','required'=>true,'help'=>'name_for_certificate.help'])@endcomponent

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('super-organiser.generate')">
                        </div>
                    </div>

                </div>

            </form>

        </section>

    </section>


@endsection