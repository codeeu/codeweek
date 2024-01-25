@extends('layout.base')

@section('content')
    <section id="codeweek-forgotpassword-page" class="codeweek-page">

        <section class="codeweek-banner simple">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('login.reset')</h1>
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="email">@lang('login.email')</label>
                            <input id="email" type="email" name="email"
                                   value="{{old('email')}}" required autofocus>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'email'])@endcomponent
                        </div>
                    </div>

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('login.send_password')">
                        </div>
                    </div>

                </form>
            </section>

        </section>

    </section>
@endsection
