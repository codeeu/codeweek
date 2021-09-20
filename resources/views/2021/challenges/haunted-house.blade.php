@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #222220">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">@lang('challenges.title')</a></div>
                    <div class="text-5xl mt-2" style="color: #EEE91F">Haunted House in Hedy</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/haunted-house.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Felienne Hermans, Leiden University - Ramon Moorlag, I&I - CodeWeek NL'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>Teachers and educators</li>
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
                            <li>1 hour or 2 hours depending on prior knowledge</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>
                                Hedy on <a href="https://www.hedycode.com">hedycode.com</a>,level 1 to 4
                            </li>
                        </ol>


                    </div>


                </section>

                <div class="mx-6 my-4">

                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">

                        <li>To make an interactive Haunted House story.</li>
                        <li>To learn programming with Hedy.</li>
                    </ol>


                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            With Hedy, you will create a Haunted House story with interactive elements. Every time the
                            code is run a new story will be created. The story can also be read aloud by your computer
                            and shared online.
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                            <li>Start with opening a browser and go to hedycode.com.</li>
                            <li>Follow the instructions for levels 1-4. Use the tabs ‘Level’ and ‘Haunted house.’</li>
                            <li>With the help of these levels, we will write an interactive haunted house story.</li>
                            <li>Teachers, a lesson plan Hedy can be found <a
                                        href="https://www.hedycode.com/for-teachers?lang=en">here</a>.
                            </li>
                            <li>You can find a recording of Felienne Hermans presenting Hedy at <a
                                        href="https://www.youtube.com/watch?v=EdqT313rM40&t=1s">this link</a>.
                            </li>

                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <ul class="leading-7 ml-2 checklist mt-2">
                            <li><a href="https://www.hedycode.com/hedy/94ee69a567c34071af4189c827af4041/view">Haunted house example at level 2</a></li>
                            <li><a href="https://www.hedycode.com/hedy/df5ae8a1303041cd84c60efe73de0485/view">Haunted house example at level 4</a></li>
                        </ul>

                        <div class="mt-2 w-10/12">

                            <img src="{{asset('img/2021/challenges/haunted-house-1.png')}}"/>


                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Haunted+House+in+Hedy.docx'])
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
