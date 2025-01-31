@extends('layout.base')

@section('content')
<section id="codeweek-login-page" class="codeweek-page">
    <section class="codeweek-content-wrapper">
        <div class="codeweek-content-wrapper-inside">
            <div class="login-tabs">
                <a href="#" id="login-tab" class="tab active-tab">@lang('login.login')</a>
                <a href="#" id="register-tab" class="tab">@lang('login.register')</a>
            </div>

            <div class="social-icons">
                    <a href="/login/twitter"><img src="/images/twitter-icon.svg" alt="Twitter"></a>
                    <a href="/login/github"><img src="/images/github-icon.svg" alt="Google"></a>
                    <a href="/login/facebook"><img src="/images/facebook-icon.svg" alt="Facebook"></a>
                    <a href="/login/google"><img src="/images/google-icon.svg" alt="Google"></a>
                </div>

                <div class="separator-line">
                    <div class="line"></div>
                    <span class="separator-text">OR</span>
                    <div class="line"></div>
                </div>
                
            <!-- Login Form -->
            <div id="login-form">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="codeweek-form-field-wrapper">
                        <label for="email">@lang('login.email')</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="codeweek-form-field-wrapper">
                        <label for="password">@lang('login.password')</label>
                        <input id="password" type="password" name="password" required>
                    </div>

                    <div class="login-other-actions">
                        <a href="{{ route('password.request') }}">@lang('login.forgotten_password')</a>
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
            </div>

            <!-- Register Form -->
            <div id="register-form" class="hidden">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @honeypot

                    <div class="codeweek-form-field-wrapper">
                        <label for="name">@lang('login.name')</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="codeweek-form-field-wrapper">
                        <label for="email">@lang('login.email')</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="codeweek-form-field-wrapper">
                        <label for="password">@lang('login.password')</label>
                        <input id="password" type="password" name="password" required>
                    </div>

                    <div class="codeweek-form-field-wrapper">
                        <label for="password-confirm">@lang('login.confirm_password')</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required>
                    </div>

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('login.register')">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loginTab = document.getElementById("login-tab");
        const registerTab = document.getElementById("register-tab");
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");

        loginTab.addEventListener("click", function (event) {
            event.preventDefault();
            loginForm.classList.remove("hidden");
            registerForm.classList.add("hidden");
            loginTab.classList.add("active-tab");
            registerTab.classList.remove("active-tab");
        });

        registerTab.addEventListener("click", function (event) {
            event.preventDefault();
            registerForm.classList.remove("hidden");
            loginForm.classList.add("hidden");
            registerTab.classList.add("active-tab");
            loginTab.classList.remove("active-tab");
        });
    });
</script>