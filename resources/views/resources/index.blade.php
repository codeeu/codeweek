@extends('layout.base')

@section('content')
    <section>

        <div class="container resources-container">

            <div class="flex flex-col justify-center text-center w-full uppercase">
                {{--<h1>Resources</h1>--}}
            </div>

            <resource-form
                    :levels="{{ $levels }}"
                    :programming-languages="{{ $programmingLanguages }}"
                    :languages="{{ $languages }}"
                    :categories="{{ $categories }}"
                    :subjects="{{ $subjects }}"
                    :types="{{ $types }}"
            ></resource-form>



        </div>
    </section>


@endsection

