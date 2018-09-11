@extends('layout.base')

@section('content')


    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>@lang('schools.title')</h1>
                        <span></span>
                    </div>

                    <hr>


                </div>

                @foreach($questions as $question)
                    <question :question="{{json_encode($question)}}"></question>
                @endforeach


            </div>
        </div>
    </section>



@endsection

@section("extra-css")
    <style>

        .submit-button-wrapper.btn-lg input {

            padding: 15px 15px 15px 30px;
            background: transparent;
            border: none;
            text-transform: none;
            letter-spacing: 2px;
        }

        .btn-primary, .btn-primary:hover {
            background: #f58732ed;
        }

        .tab{
            position: relative;
            margin-bottom: 1px;
            width: 100%;
            color: #232323;
            overflow: hidden;
        }

        .answer {
            padding: 20px;
            background-color: #f1f1f1;
        }

        .subtitle{
            color: #2a6496;
            font-size: 1.8rem;
            padding-bottom: 2rem;
            padding-top: 1rem;
        }

        .question{
            position: relative;
            display: block;
            width: 100%;
            padding: 0 0 0 1em;
            background: #2980b9;
            font-weight: bold;
            line-height: 3;
            cursor: pointer;
            color: #fff;
            text-align: center;
            font-size: 2rem;
        }

        .chevron{
            display: block;
            margin-top: -23px;

            padding: 10px;
        }

        .map{
            height:400px;
            margin-bottom:1rem;
        }



    </style>

@endsection