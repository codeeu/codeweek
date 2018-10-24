@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Krijimi i loj&euml;rave edukative me Scratch</h1><span>nga Jes&uacute;s Moreno Le&oacute;n</span></div>

                    <hr>

                    <p>Mendimi kritik, k&euml;mb&euml;ngulja, zgjidhja e problemeve, mendimi kompjuterik dhe kreativiteti jan&euml; vet&euml;m disa prej aft&euml;sive ky&ccedil;e q&euml; u nevojiten nx&euml;n&euml;sve tuaj p&euml;r t&euml; pasur sukses n&euml; shekullin XXI, dhe kodimi mund t&rsquo;ju ndihmoj&euml; t&rsquo;i arrini k&euml;to n&euml; m&euml;nyr&euml; arg&euml;tuese dhe motivuese.</p>

                    <p>Nocionet algoritmike t&euml; kontrollit t&euml; fluksit duke p&euml;rdorur sekuencat e udh&euml;zimeve dhe ciklet, paraqitja e t&euml; dh&euml;nave duke p&euml;rdorur ndryshoret dhe listat ose sinkronizimi i proceseve, mund t&euml; ting&euml;llojn&euml; si koncepte t&euml; komplikuara, por n&euml; k&euml;t&euml; video do t&euml; shikoni se ato jan&euml; m&euml; t&euml; lehta p&euml;r t&rsquo;u m&euml;suar sesa mendoni.</p>

                    <p>N&euml; k&euml;t&euml; video, Jes&uacute;s Moreno Le&oacute;n, m&euml;sues i Shkencave Kompjuterike dhe studiues nga Spanja, do t&euml; shpjegoj&euml; se si mund t&euml; zhvilloni k&euml;to aft&euml;si dhe t&euml; tjera si ato te nx&euml;n&euml;sit tuaj nd&euml;rkoh&euml; q&euml; arg&euml;toheni. Si mund t&euml; b&euml;het kjo? Duke krijuar nj&euml; loj&euml; me pyetje dhe p&euml;rgjigje n&euml; Scratch, gjuha m&euml; e njohur e programimit e p&euml;rdorur n&euml; shkolla n&euml; mbar&euml; bot&euml;n. Scratch jo vet&euml;m p&euml;rmir&euml;son mendimin kompjuterik, por edhe lejon prezantimin e elementeve t&euml; konceptit t&euml; loj&euml;s n&euml; klas&euml; p&euml;r t&rsquo;i mbajtur nx&euml;n&euml;sit t&euml; motivuar nd&euml;rkoh&euml; q&euml; m&euml;sojn&euml; dhe arg&euml;tohen.</p>

                    <p>Hidhini nj&euml; sy videos p&euml;r t&euml; m&euml;suar se si t&euml; filloni:</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">Shkarko tekstin e videos</a></p>

                    <h2>Jeni gati t&euml; ndani at&euml; q&euml; keni m&euml;suar me nx&euml;n&euml;sit tuaj?</h2>

                    <p>Zgjidhni nj&euml; prej planeve m&euml;simore m&euml; posht&euml; dhe organizoni nj&euml; aktivitet me nx&euml;n&euml;sit tuaj.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">Aktiviteti 1 - Loj&euml; me pyetje dhe p&euml;rgjigje me Scratch p&euml;r ciklin e ul&euml;t fillor</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">Aktiviteti 2 - Loj&euml; me pyetje dhe p&euml;rgjigje me Scratch p&euml;r ciklin e mes&euml;m t&euml; ul&euml;t</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">Aktiviteti 3 - Loj&euml; me pyetje dhe p&euml;rgjigje me Scratch p&euml;r shkoll&euml;n e mesme</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection