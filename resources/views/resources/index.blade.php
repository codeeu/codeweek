@extends('layout.base')

@section('content')
    <section>

        <div class="container resources-container">

            <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                <h1>New Resources</h1>
                <span>EU Code Week 2018</span>
            </div>

            <hr>

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

