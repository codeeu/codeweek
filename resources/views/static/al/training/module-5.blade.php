@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Krijimi, robotika dhe riparimet n&euml; klas&euml;</h1><span>nga Tullia Urschitz</span></div>

                    <hr>

                    <p>Integrimi i kodimit, riparimeve, robotik&euml;s dhe mikroelektronik&euml;s si mjete m&euml;simi dhe m&euml;simdh&euml;nieje, n&euml; programin e shkoll&euml;s jan&euml; elemente ky&ccedil;e n&euml; arsimin e shekullit XXI.</p>

                    <p>P&euml;rdorimi i riparimeve dhe robotik&euml;s n&euml; shkolla ka avantazhe t&euml; shumta p&euml;r nx&euml;n&euml;sit, sepse i ndihmon t&euml; zhvillojn&euml; kompetenca ky&ccedil;e si p.sh. zgjidhjen e problemeve, pun&euml;n n&euml; ekip dhe bashk&euml;punimin. Ajo gjithashtu nxit kreativitetin dhe vet&euml;besimin e nx&euml;n&euml;sve dhe i ndihmon ata t&euml; zhvillojn&euml; k&euml;mb&euml;nguljen dhe vendosm&euml;rin&euml; kur p&euml;rballen me sfida. Robotika &euml;sht&euml; gjithashtu nj&euml; fush&euml; q&euml; promovon gjith&euml;p&euml;rfshirjen, sepse &euml;sht&euml; leht&euml;sisht e aksesueshme p&euml;r nj&euml; gam&euml; t&euml; gjer&euml; nx&euml;n&euml;sish me talente dhe aft&euml;si t&euml; ndryshme (si djem, edhe vajza) dhe influencon n&euml; m&euml;nyr&euml; pozitive te nx&euml;n&euml;sit n&euml; spektrin e autizmit.</p>

                    <p>Hidhini nj&euml; sy k&euml;saj videoje ku Tullia Urschitz, ambasadore italiane e Scientix dhe m&euml;suese e STEM n&euml; Sant&rsquo;Ambrogio Di Valpolicella, Itali, do t&rsquo;ju jap&euml; disa shembuj praktik&euml; rreth m&euml;nyr&euml;s se si m&euml;suesit mund t&euml; integrojn&euml; riparimet dhe robotik&euml;n n&euml; klas&euml;, duke i transformuar k&euml;shtu nx&euml;n&euml;sit pasiv&euml; n&euml; krijues entuziast&euml;.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">Shkarko tekstin e videos</a></p>

                    <h2>Jeni gati t&euml; ndani at&euml; q&euml; keni m&euml;suar me nx&euml;n&euml;sit tuaj?</h2>

                    <p>Zgjidhni nj&euml; prej planeve m&euml;simore m&euml; posht&euml; dhe organizoni nj&euml; aktivitet me nx&euml;n&euml;sit tuaj.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">Aktiviteti 1 - Si t&euml; krijoni nj&euml; dor&euml; mekanike prej kartoni n&euml; ciklin e ul&euml;t fillor</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">Aktiviteti 2 - Si t&euml; krijoni nj&euml; dor&euml; mekanike prej kartoni n&euml; ciklin e mes&euml;m t&euml; ul&euml;t</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">Aktiviteti 3 - Si t&euml; krijoni nj&euml; dor&euml; mekanike prej kartoni n&euml; shkoll&euml;n e mesme</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection