@extends('layout.base')

@section('content')
    <div class="container">

        <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
            <h1>@lang('participation.thanks_page.title')</h1>

        </div>

        <hr>

        <header class="flex flex-col justify-between">

            <p class="mb-4 text-grey-dark">
                @lang('participation.thanks_page.phrase1')
            </p>

        </header>


    </div>
@endsection