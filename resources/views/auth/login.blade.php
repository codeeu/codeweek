@extends('layout.base')

@section('content')

    <section id="codeweek-login-page" class="codeweek-page">

        <section class="codeweek-banner simple">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('login.login')</h1>
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <div class="social-media-buttons">
                    <a href="/login/github" class="codeweek-action-link-button github">
                        <img src="/images/github_white.svg">
                        @lang('login.github')
                    </a>
                    <a href="/login/twitter" class="codeweek-action-link-button twitter">
                        <img src="/images/twitter_white.svg">
                        @lang('login.twitter')
                    </a>
                    <a href="/login/facebook" class="codeweek-action-link-button facebook">
                        <img src="/images/facebook_white.svg">
                        @lang('login.facebook')
                    </a>
                    <a href="/login/google" class="codeweek-action-link-button google">
                        <img src="/images/google_white.svg">
                        @lang('login.google')
                    </a>
                    <a href="/login/azure" class="codeweek-action-link-button azure">
                        <img src="/img/azure.png">
                        @lang('login.azure')
                    </a>
                </div>

                <div class="separator">
                    <div class="line"></div>
                    <div class="text">OR</div>
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
                            <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                @lang('login.forgotten_password')
                            </a>
                        </div>
                        <div class="sign-up">
                            @lang('login.no_account') &nbsp;
                            <a href="/register" class="flex justify-center text-center">
                                @lang('login.signup')
                            </a>
                        </div>
                    </div>

                </div>

            </section>

        </section>

    </section>

    {{--<section>

        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">

                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>       @lang('login.login')</h1>
                        <span></span>
                    </div>


                    <div class="col-md-6 col-md-offset-3">
                        <div class="card">
                            <div class="card-header"></div>

                            <div class="card-body">


                                <a href="/login/github"
                                   class="btn-block btn-social btn-lg btn-github">
                                    <i class="fa fa-github-square mt-6"></i> @lang('login.github')
                                </a>
                                <a href="/login/twitter"
                                   class="btn-block btn-social btn-lg btn-twitter">
                                    <i class="fa fa-twitter-square mt-6"></i> @lang('login.twitter')
                                </a>
                                <a href="/login/facebook"
                                   class="btn-block btn-social btn-lg btn-facebook">
                                    <i class="fa fa-facebook-square mt-6"></i> @lang('login.facebook')
                                </a>
                                <a href="/login/google"
                                   class="btn-block btn-social btn-lg btn-google-plus">
                                    <i class="fa fa-google-plus-square mt-6"></i> @lang('login.google')
                                </a>
                                <a href="/login/azure"
                                   class="btn-block btn-social btn-lg btn-vk">

                                    <img src="/img/azure.png" class="mt-4"> @lang('login.azure')
                                </a>


                                <div class="my-divider">
                                    <strong class="my-divider-title">or</strong>
                                </div>

                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">@lang('login.email')</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">@lang('login.password')</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control"
                                                   name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"
                                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    @lang('login.remember')
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                @lang('login.login')
                                            </button>

                                            <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                                @lang('login.forgotten_password')
                                            </a>
                                        </div>
                                    </div>
                                </form>

                                <div class="flex justify-center text-center w-full mb-8 text">
                                    @lang('login.no_account')&nbsp;<a href="/register" class="flex justify-center text-center">@lang('login.signup')</a>
                                </div>

                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>


    </section>--}}
@endsection
