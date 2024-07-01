@extends('layout.base')

@section('content')
    <section id="codeweek-login-page" class="codeweek-page">

        <section class="codeweek-banner simple">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('login.login')</h1>
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <div class="social-media-buttons">

                    <a href="/login/facebook" class="codeweek-action-link-button facebook">
                        <img src="/images/facebook_white.svg">
                        @lang('login.facebook')
                    </a>
                    <a href="/login/google" class="codeweek-action-link-button google">
                        <img src="/images/google_white.svg">
                        @lang('login.google')
                    </a>
                    <a href="/login/github" class="codeweek-action-link-button github">
                        <img src="/images/github_white.svg">
                        @lang('login.github')
                    </a>
                    <a href="/login/twitter" class="codeweek-action-link-button twitter">
                        <img src="/images/x_logo.svg">
                        @lang('login.X')
                    </a>
                </div>

                <div class="separator">
                    <div class="line"></div>
                    <div class="text" style="text-transform: uppercase">@lang('base.or')</div>
                    <div class="line"></div>
                </div>

                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

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
                                <label for="password">@lang('login.password')</label>
                                <input id="password" type="password" name="password"
                                       value="{{old('title')}}" required>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'password'])@endcomponent
                            </div>
                        </div>
                        <div class="codeweek-form-field-checkbox">
                            <label>
                                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                @lang('login.remember')
                            </label>
                        </div>

                        <div class="codeweek-form-button-container">
                            <div class="codeweek-button">
                                <input type="submit" value="@lang('login.login')">
                            </div>
                        </div>
                    </form>
                    <div class="login-other-actions">
                        <div class="forgot-password">
                            <a href="{{ route('password.request') }}">
                                @lang('login.forgotten_password')
                            </a>
                        </div>
                        <div class="sign-up">
                            @lang('login.no_account') &nbsp;
                            <a href="/register">
                                @lang('login.signup')
                            </a>
                        </div>
                    </div>

                </div>

            </section>

        </section>

    </section>
@endsection
