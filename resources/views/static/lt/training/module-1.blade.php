@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Programavimas be kompiuterių (atsijungus)</h1><span>Alessandro Bogliolo</span></div>

                    <hr>

                    <p>Programavimas yra daiktų kalba, leidžianti mums ra&scaron;yti programas, kurios suteikia naujų funkcijų de&scaron;imtims milijardų mus supančių programuojamų objektų. Programavimas yra greitesnis būdas įgyvendinti mūsų idėjas ir efektyviausias būdas lavinti skaitmeninio mąstymo gebėjimus. Tačiau skaitmeninio mąstymo lavinimui nebūtinai reikia technologijų. Atvirk&scaron;čiai, tam, kad technologijos veiktų, reikia mūsų skaitmeninio mąstymo įgūdžių.</p>

                    <p>&Scaron;iame vaizdo įra&scaron;e kompiuterinių sistemų dėstytojas (Italija) ir Europos programavimo savaitės koordinatorius Alessandro Bogliolo pristato programavimą nenaudojant jokio elektroninio prietaiso. Pagrindinis veiklos be kompiuterio tikslas&nbsp;&ndash; sumažinti kliūtis, kad kiekvienoje mokykloje būtų galima programuoti, nepriklausomai nuo finansavimo ir įrangos.</p>

                    <p>Programavimo veikla be kompiuterio atskleidžia aplinkinio fizinio pasaulio skaičiavimo aspektus.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">Atsisiųsti vaizdo įra&scaron;o scenarijų</a></p>

                    <h2>Ar pasiruo&scaron;ę su savo mokiniais pasidalyti tuo, ką sužinojote?</h2>

                    <p>Pasirinkite vieną i&scaron; toliau pateiktų pamokos planų ir įgyvendinkite jį su savo mokiniais.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">1&nbsp;veikla. &bdquo;CodyRoby&ldquo; pradinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">2&nbsp;veikla. &bdquo;CodyRoby&ldquo; jaunesnių klasių vidurinės mokyklos mokiniams</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">3&nbsp;veikla. &bdquo;CodyRoby&ldquo; vyresnių klasių vidurinės mokyklos mokiniams</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection