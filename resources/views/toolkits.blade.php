@extends('layout.base')

@section('content')



    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Toolkits</h1>
                        <span></span>
                    </div>

                    <hr>


                </div>

                <ul>

                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BCommunications%2BToolkit.zip">EU Code Week 2019 Communications Toolkit</a></li>
                    <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/EU%2BCode%2BWeek%2B2019%2BTeachers%2BToolkit.zip">EU Code Week 2019 Teachers Toolkit</a></li>
                    <li>EU Code Week 2019 Leaflet (

                            @foreach($languages as $lang)
                                @if($lang === $locale)
                                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
                                @endif

                            @endforeach

                            @if($locale !== 'en')
                                 - <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_EN.pdf">@lang('base.languages.en')</a>
                            @endif

                        )
                    <li><a href="/guide">How to organise an activity ?</a>

                    </li>


                </ul>


            </div>
        </div>
    </section>




@endsection