@extends('layout.base')

@section('content')

    <section id="codeweek-toolkits-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('guide.title')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_learn_teach.svg" class="static-image">
            </div>
        </section>

        <div class="codeweek-content-wrapper">

                <div class="container clearfix">

                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>@lang('guide.organise_activity')</h1>
                        <span></span>
                        <div>
                            <a href="/add" target="_blank" class="btn btn-xl mt-8">@lang('guide.register_activity')</a>
                        </div>
                    </div>

                </div>

                <h2>@lang('guide.what.title')</h2>
                @lang('guide.what.content')

                <h2>@lang('guide.what_you_need_organise.title')</h2>
                <ul>
                    <li>@lang('guide.what_you_need_organise.items.1')</li>
                    <li>@lang('guide.what_you_need_organise.items.2')</li>
                    <li>@lang('guide.what_you_need_organise.items.3')</li>
                    <li>@lang('guide.what_you_need_organise.items.4')</li>
                    <li>@lang('guide.what_you_need_organise.items.5')</li>
                    <li>@lang('guide.what_you_need_organise.items.6')</li>
                    <li>@lang('guide.what_you_need_organise.items.7')</li>
                    <li>@lang('guide.what_you_need_organise.items.8')</li>
                </ul>


                <h2>@lang('guide.how_to.title')</h2>
                <ul>
                    <li>@lang('guide.how_to.items.1')</li>
                    <li>@lang('guide.how_to.items.2')</li>
                    <li>@lang('guide.how_to.items.3')</li>
                    <li>@lang('guide.how_to.items.4')</li>
                    <li>@lang('guide.how_to.items.5')</li>
                </ul>

                <h2>@lang('guide.material.title')</h2>
                @lang('guide.material.text')
                <ul>
                    <li>@lang('guide.material.items.1')</li>
                    <li>@lang('guide.material.items.2')</li>
                </ul>

                <h2>@lang('guide.toolkits.title')</h2>
                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">
                            @lang('guide.toolkits.communication_toolkit')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">
                            @lang('guide.toolkits.teachers_toolkit')
                        </a>
                    </li>
                </ul>

                <h2>@lang('guide.questions.title')</h2>
                @lang('guide.questions.content')

            </div>

    </section>

@endsection