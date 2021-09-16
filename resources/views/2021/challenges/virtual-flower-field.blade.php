@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #EDD62F">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black" href="{{route('challenges')}}">EU CODE
                            WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #4a990d">Grow your virtual flower field</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/virtual-flower-field.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Jadga Huegle - Meet and Code coach and part of the SAP Snap! team'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>Primary School students (6 to 12 years)</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="list-disc ml-5">
                            <li>Beginner</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.duration')</div>
                        <ol class="list-disc ml-5">
                            <li>30-60 minutes</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>
                                We recommend using <a href="https://snap.berkeley.edu">Snap!</a>, however, the project also works in <a href="https://scratch.mit.edu">Scratch</a>.
                            </li>
                        </ol>



                    </div>




                </section>

                <div class="mx-6 my-4">

                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">

                        <li>To get to know programming with a simple yet expressive project.</li>
                        <li>To learn that coding can be artistic and lead to beautiful results.</li>
                        <li>To make fall brighter with colorful flowers and the EU Code Week.</li>
                        <li>To show the diversity of flowers on Earth.</li>
                        <li>To contribute to Sustainable Development Goals (SDGs), especially SDG13 -Climate Change by creating coding events that improve climate change education through raising awareness on this topic.</li>

                    </ol>


                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            CS First Unplugged is a set of activities that introduce students to CS concepts without a computer. We’ve designed this lesson to demonstrate that Computer Science is a lot more than just code.
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>If you need inspiration on how to get started with the challenge, check out this <a href="https://youtu.be/VcPc4VVDp2c">video</a> or use this <a href="https://tinyurl.com/virtualflowerfield">document</a> to follow along.</li>
                                <li>The challenge can be completed by programming a virtual flower field in Snap! (or Scratch) and posting a screenshot or photo of the result online.</li>
                                <li>The flower field should contain different types of flowers with different numbers of petals. Ideally, the flowers are programmed, which means that they are constructed by stamping and turning (or drawing and turning) petals repeatedly.</li>
                                <li>Post an image of your virtual flower garden with #MeetandCode.</li>

                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                            <div class="mt-2 w-1/2">

                                    <img src="{{asset('img/2021/challenges/virtual-flower-field.png')}}"/>


                            </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Grow+your+virtual+flower+field.docx'])
            </div>
        </section>
    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
