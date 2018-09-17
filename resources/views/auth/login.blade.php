@extends('layout.base')

@section('content')
    <section>

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


    </section>
@endsection

@section('extra-css')
    <style>
        .my-divider {
            border-top: 1px solid #d9dadc;
            display: block;
            line-height: 1px;
            margin: 15px 0;
            position: relative;
            text-align: center;
        }

        .my-divider .my-divider-title {
            background: #fff;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 0 20px;
            text-transform: uppercase;
        }

    </style>

    @endsection
