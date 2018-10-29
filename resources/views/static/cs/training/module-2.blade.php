@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Informatick&eacute; my&scaron;len&iacute; a ře&scaron;en&iacute; probl&eacute;mů</h1><span>Miles Berry</span></div>

                    <hr>

                    <p>Informatick&eacute; my&scaron;len&iacute; (IM) označuje způsob př&iacute;stupu k probl&eacute;mům a syst&eacute;mům tak, aby poč&iacute;tač bylo možn&eacute; využ&iacute;t k jejich ře&scaron;en&iacute; nebo pochopen&iacute;. Informatick&eacute; my&scaron;len&iacute; je nejen nezbytn&eacute; k tvorbě poč&iacute;tačov&yacute;ch programů, ale může b&yacute;t využito při ře&scaron;en&iacute; probl&eacute;mů např&iacute;č v&scaron;emi discipl&iacute;nami.</p>

                    <p>IM můžete ž&aacute;ky učit tak, že je nauč&iacute;te rozdělit komplexn&iacute; probl&eacute;my na men&scaron;&iacute; (dekompozice), rozeznat vzory (rozezn&aacute;v&aacute;n&iacute; vzorů), identifikovat podstatn&eacute; detaily (abstrakce) nebo stanovit pravidla či instrukce, aby se dos&aacute;hlo ž&aacute;douc&iacute;ho v&yacute;sledku (tvorba algoritmů). IM je možn&eacute; učit např&iacute;č discipl&iacute;nami, např&iacute;klad v matematice (zjistit pravidla faktorizace polynomů druh&eacute;ho ř&aacute;du), v literatuře (při rozboru b&aacute;sně prov&eacute;st rozbor rytmu, r&yacute;mu a stavby), v jazyc&iacute;ch (naj&iacute;t vzory v posledn&iacute;ch p&iacute;smenech slovesa, kter&eacute; ovlivňuj&iacute; jeho pravopis při skloňov&aacute;n&iacute;) a podobně.</p>

                    <p>Miles Berry, hlavn&iacute; lektor University of Roehampton School of Education v Guildfordu (Velk&aacute; Brit&aacute;nie), představ&iacute; koncept informatick&eacute;ho my&scaron;len&iacute; a různ&eacute; způsoby, jak ho učitel může zařadit do jednoduch&yacute;ch her ve tř&iacute;dě.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">St&aacute;hnout sc&eacute;n&aacute;ř videa</a></p>

                    <h2>Jste připraveni podělit se s ž&aacute;ky o to, co jste se dozvěděli?</h2>

                    <p>Vyberte si jeden z n&iacute;že uveden&yacute;ch v&yacute;ukov&yacute;ch pl&aacute;nů a zorganizujte akci se sv&yacute;mi ž&aacute;ky.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">Aktivita 1 &ndash; Rozvoj matematick&eacute;ho uvažov&aacute;n&iacute; pro z&aacute;kladn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">Aktivita 2 &ndash; Sezn&aacute;men&iacute; se s algoritmy pro niž&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">Aktivita 3 &ndash; Algoritmy pro vy&scaron;&scaron;&iacute; středn&iacute; &scaron;kolu</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection