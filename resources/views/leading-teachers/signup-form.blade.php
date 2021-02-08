@extends('layout.base')

@section('content')

    <section id="codeweek-report-event-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>Leading Teacher Registration</h1>
            <p>Please fill this form to apply as a leading teacher</p>

        </section>


        <section class="codeweek-content-wrapper" style="margin-top:0;">

            <form enctype="multipart/form-data" method="post" id="signupform" role="form"
                  class="codeweek-form" action="{{route('LT.signup.store')}}">
                {{csrf_field()}}

                <div class="codeweek-form-inner-container">

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_title">Your email address</label>
                            <input id="email" name="account_email" type="email" style="background: #dedede"
                                   value="{{auth()->user()->email}}" readonly>
                        </div>

                    </div>

                    @component('components.report.form-field-LT',['label'=>'First Name','field_name'=>'first_name','type'=>'text','required'=>true])@endcomponent
                    @component('components.report.form-field-LT',['label'=>'Last Name','field_name'=>'last_name','type'=>'text','required'=>true])@endcomponent
                    @component('components.report.form-field-LT',['label'=>'Twitter Handle','field_name'=>'twitter','type'=>'text','required'=>false])@endcomponent


                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_country">* @lang('event.country')</label>
                            <select id="id_country" name="country" class="codeweek-input-select">
                                <option value="">Choose your country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->iso}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'country'])@endcomponent
                        </div>
                    </div>

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_country">* City</label>
                            <select id="id_country" name="country" class="codeweek-input-select">
                                <option value="">Choose your city</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->country}} / {{$city->city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'country'])@endcomponent
                        </div>
                    </div>

                    @component('components.report.form-field-LT',['label'=>'City where you teach','field_name'=>'city','type'=>'text','required'=>true])@endcomponent


{{--                    <div class="codeweek-form-field-wrapper">--}}
{{--                        <div class="codeweek-form-field">--}}
{{--                            <label for="id_level">* Students Levels</label>--}}
{{--                            <select id="id_level" name="levels" class="codeweek-input-select" multiple>--}}
{{--                                <option value="">What level of students do you teach?</option>--}}

{{--                                    <option value="Pre-primary">Pre-primary</option>--}}
{{--                                    <option value="Primary">Primary</option>--}}
{{--                                    <option value="Lower Secondary">Lower Secondary</option>--}}
{{--                                    <option value="Upper Secondary">Upper Secondary</option>--}}
{{--                                    <option value="Tertiary">Tertiary</option>--}}
{{--                                    <option value="Other">Other</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="errors">--}}
{{--                            @component('components.validation-errors', ['field'=>'country'])@endcomponent--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_audience">* Students Levels</label>
                            <multiselect :options="{{ $levels }}" value="{{ old('levels') }}" name="levels"
                                         label="leading-teacher.levels"></multiselect>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'audience'])@endcomponent
                        </div>
                    </div>



                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="Submit">
                        </div>
                    </div>

                </div>

            </form>

        </section>

    </section>

@endsection
