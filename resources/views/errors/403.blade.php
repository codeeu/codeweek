@extends('layout.base')

@section('content')


    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8">
                        @if($exception->getMessage())

                            <h4>{{$exception->getMessage()}}</h4>

                        @else
                            <h1>You are not authorized to perform this action !</h1>
                        @endif


                        <span></span>
                    </div>

                </div>
            </div>
        </div>
    </section>





@endsection