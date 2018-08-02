@extends('layout.base')

@section('content')
    <section>

        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">

                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>{{ __('login.login') }}</h1>
                        <span></span>
                    </div>


                    <div class="col-md-6 col-md-offset-3">
                        <div class="card">
                            <div class="card-header"></div>

                            <div class="card-body">


                                <a href="/login/github"
                                   class="btn-block btn-social btn-lg btn-github">
                                    <i class="fa fa-github-square mt-6"></i> Sign in with Github
                                </a>
                                <a href="/login/twitter"
                                   class="btn-block btn-social btn-lg btn-twitter">
                                    <i class="fa fa-twitter-square mt-6"></i> Sign in with Twitter
                                </a>
                                <a href="/login/facebook"
                                   class="btn-block btn-social btn-lg btn-facebook">
                                    <i class="fa fa-facebook-square mt-6"></i> Sign in with Facebook
                                </a>
                                <a href="/login/google"
                                   class="btn-block btn-social btn-lg btn-google-plus">
                                    <i class="fa fa-google-plus-square mt-6"></i> Sign in with Google
                                </a>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
