@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #CCC6C6">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE
                            WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #e55327">Create your own masterpiece!</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/create-your-own-masterpiece.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Code.org'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-5 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">Target audience</div>
                        <ol class="list-disc ml-5">
                            <li>Acceptable for all ages.</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Experience</div>
                        <ol class="list-disc ml-5">
                            <li>Beginner</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Duration</div>
                        <ol class="list-disc ml-5">
                            <li>1 hour</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Recommended materials</div>
                        <ol class="list-disc ml-5">
                            <li>
                                The first level of the tutorial can be found <a href="https://studio.code.org/s/artist/lessons/1/levels/1">HERE</a>
                                </li>
                        </ol>


                    </div>


                    <div>
                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>To introduce computer science concepts in a visual way and inspire creativity.</li>
                        </ol>


                    </div>




                </section>




                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>
                        <div class="mt-2 w-1/2">
                            <img src="{{asset('img/2021/challenges/create-your-own-masterpiece-1.png')}}"/>
                        </div>

                        <div class="mt-2">
                            Create your own masterpiece with artist! Use code blocks to make your artist create a unique work of art.
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>Instructions are listed at the top of each level (<a href="https://studio.code.org/s/artist/">https://studio.code.org/s/artist/</a>).
                                </li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>
                        <div class="mt-2">Artist examples can be found on this page under drawing: <a href="https://studio.code.org/projects/public">https://studio.code.org/projects/public</a>
                            <div class="mt-2 flex flex-column">

                                <img src="{{asset('img/2021/challenges/create-your-own-masterpiece-3.png')}}"/>
                                <img src="{{asset('img/2021/challenges/create-your-own-masterpiece-2.png')}}"/>



                            </div>
                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Create+your+own+masterpiece!.docx'])
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
