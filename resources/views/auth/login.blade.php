@extends('layout.app')

@section('content')
    <section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('login.login') }}</div>

                <div class="card-body">

                    <div>
                        <a href="/login/github"
                           class="btn-block btn-social btn-lg btn-github">
                            <i class="fa fa-github-square"></i> Sign in with Github
                        </a>
                        <a href="/login/facebook"
                           class="btn-block btn-social btn-lg btn-facebook">
                            <i class="fa fa-facebook-square"></i> Sign in with Facebook
                        </a>
                        <a href="/login/google"
                           class="btn-block btn-social btn-lg btn-google-plus">
                            <i class="fa fa-google-plus-square"></i> Sign in with Google
                        </a>
                        <a href="/login/twitter"
                           class="btn-block btn-social btn-lg btn-google-plus">
                            <i class="fa fa-twitter-square"></i> Sign in with Twitter
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
