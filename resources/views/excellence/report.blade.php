@extends('layout.base')

@section('content')
    <div class="container">

        <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
            <h1>Report Excellence for Codeweek edition of {{$edition}}</h1>

        </div>

        <hr>

        <header class="flex flex-col justify-between">

            <p class="mb-4 text-grey-dark">
                Some text is coming here
            </p>


        </header>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <form enctype="multipart/form-data" method="post" id="event" role="form"
                      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                      action="/certificates/excellence/{{$edition}}">
                    {{csrf_field()}}

                    @component('components.report.form-field-simple',['field_name'=>'name_for_certificate','type'=>'text','required'=>true,'help'=>'name_for_certificate.help'])@endcomponent



                    <div class="flex items-center justify-between mt-8">
                        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                                type="submit">
                            @lang('report.submit')
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection