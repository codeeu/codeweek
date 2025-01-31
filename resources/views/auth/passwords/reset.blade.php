@extends('layout.base')

@section('content')

    <section id="codeweek-forgotpassword-page" class="codeweek-page">

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="codeweek-form-field" style="margin-bottom:10px">
                        <label for="email"
                               >@lang('login.email')</label>

                        <div style="width:600px">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ app('request')->input('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>

                    <div class="codeweek-form-field" style="margin-bottom:10px">
                        <label for="password"
                               class="col-md-4 control-label col-form-label text-md-right">@lang('login.password')</label>

                        <div style="width:600px">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="codeweek-form-field" style="margin-bottom:10px">
                        <label for="password-confirm"
                               class="col-md-4 control-label col-form-label text-md-right">@lang('login.confirm_password')</label>
                        <div style="width:600px">
                            <input id="password-confirm" type="password"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                   name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('login.reset')">

                        </div>
                    </div>



                </form>

            </section>

        </section>

    </section>



