@extends('layout.base')

@section('content')
    <section id="codeweek-register-page" class="codeweek-page">

        <section class="codeweek-banner simple">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('login.register')</h1>
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @honeypot

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="name">@lang('login.name')</label>
                            <input id="name" type="text" name="name"
                                   value="{{old('name')}}" required>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'name'])@endcomponent
                        </div>
                    </div>

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


                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="email">@lang('login.password')</label>
                            <input id="password" type="password" name="password"
                                   value="{{old('password')}}" required>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'password'])@endcomponent
                        </div>
                    </div>

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="email">@lang('login.confirm_password')</label>
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'password-confirm'])@endcomponent
                        </div>
                    </div>

                    <div class="codeweek-form-field-privacy">
                        <label>
                            <input id="checkPrivacy" name="privacy" type="checkbox">
                            @lang('event.privacy')
                            <a href="{{route('privacy-contact-points')}}" target="_blank">
                                <img src="/images/external-link.svg" width="16" class="static-image">
                            </a>
                        </label>
                        @component('components.validation-errors', ['field'=>'privacy'])
                        @endcomponent
                    </div>

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('login.register')">
                        </div>
                    </div>

                </form>
            </section>

        </section>

    </section>
@endsection
