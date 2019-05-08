@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Skapande robotteknik och mekande i klassrummet</h1><span>med Tullia Urschitz</span></div>

                    <hr>

                    <p>Ett viktigt m&aring;l f&ouml;r utbildningsv&auml;sendet under 2000-talet &auml;r att integrera kodning, mekande, robotteknik och mikroelektronik i l&auml;roplanerna.</p>

                    <p>Att arbeta med robotteknik i skolorna har m&aring;nga f&ouml;rdelar f&ouml;r eleverna eftersom det hj&auml;lper till att utveckla viktiga f&auml;rdigheter som probleml&ouml;sning, teamwork och samarbete. Det &ouml;kar elevernas kreativitet och sj&auml;lvf&ouml;rtroende och kan dessutom hj&auml;lpa eleverna att utveckla uth&aring;llighet och beslutsamhet n&auml;r de st&aring;r inf&ouml;r utmaningar. Robotteknik &auml;r ett f&auml;lt som uppmuntrar till social integrering, eftersom det kan l&auml;ras ut till ett brett spektrum av elever med olika talanger och f&auml;rdigheter oavsett k&ouml;n och det p&aring;verkar positivt elever med autistiska drag.</p>

                    <p>I den h&auml;r filmen ger Tullia Urschitz, Scientix-ambassad&ouml;r och STEM-l&auml;rare fr&aring;n Sant'Ambrogio di Valpolicella, Italien, n&aring;gra konkreta exempel p&aring; hur l&auml;rare kan integrera mekande och robotteknik i klassrummet och d&auml;rmed f&ouml;rvandla passiva elever till entusiastiska medskapare.</p>

                    @include('static.youtube', ['video_id' => '5V9G-vWWSik'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SV/CNECT-2018-00222-00-20-SV-TRA-00.DOCX">H&auml;mta videoskript</a></p>

                    <h2>Vill du dela med dig av det du har l&auml;rt dig till dina elever?</h2>

                    <p>V&auml;lj en lektionsplan nedan och organisera en aktivitet med dina elever.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SV/CNECT-2018-00222-00-13-SV-TRA-00.DOCX">Aktivitet 1 &ndash; Tillverka en mekanisk hand av kartong f&ouml;r grundskolan</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SV/CNECT-2018-00222-00-14-SV-TRA-00.DOCX">Aktivitet 2 &ndash; Tillverka en mekanisk hand eller robothand f&ouml;r h&ouml;gstadiet och gymnasiet</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/SV/CNECT-2018-00222-00-15-SV-TRA-00.DOCX">Aktivitet 3 &ndash; Tillverka en mekanisk hand eller robothand f&ouml;r gymnasiet</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection