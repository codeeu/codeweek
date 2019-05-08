@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>G&acirc;ndirea computațională și rezolvarea de probleme</h1><span>de Miles Berry</span></div>

                    <hr>

                    <p>G&acirc;ndirea computațională (GC) descrie un mod de a privi problemele și sistemele astfel &icirc;nc&acirc;t să poată fi folosit un calculator pentru a ne ajuta să le rezolvăm sau să le &icirc;nțelegem. G&acirc;ndirea computațională nu este doar esențială pentru dezvoltarea de programe de calculator, ci poate fi folosită și pentru a susține rezolvarea de probleme &icirc;n toate disciplinele.</p>

                    <p>&Icirc;i puteți &icirc;nvăța pe elevii dumneavoastră GC solicit&acirc;ndu-le să defalce probleme complexe &icirc;n probleme mai mici (descompunere), să recunoască tipare (recunoaștere de tipare), să identifice detalii relevante pentru rezolvarea unei probleme (abstractizare); sau stabilind reguli sau instrucțiuni de urmat pentru obținere a unui rezultat dorit (conceperea unui algoritm). GC poate fi &icirc;nvățată &icirc;n multe discipline diferite, de exemplu &icirc;n matematică (găsirea regulilor pentru factorizarea polinoamelor de gradul 2), literatură (defalcarea analizei unei poezii &icirc;n analiza metrului, a rimei și a structurii), limbi (găsirea de tipare &icirc;n literele finale ale unui verb care afectează scrierea acestuia odată cu schimbarea timpului verbal) și multe altele.</p>

                    <p>&Icirc;n acest videoclip, Miles Berry, lector principal la School of Education din Guildford, din cadrul Universității din Roehampton (Regatul Unit), va prezenta conceptul de g&acirc;ndire computațională și diversele moduri pe care un profesor le poate integra &icirc;n clasă, prin jocuri simple.</p>

                    @include('static.youtube', ['video_id' => 'Nc-V948dXWI'])

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/RO/CNECT-2018-00222-00-16-RO-TRA-00.DOCX">Descărcați textul videoclipului</a></p>

                    <h2>Sunteți gata să &icirc;mpărtășiți ce ați &icirc;nvățat cu elevii dumneavoastră?</h2>

                    <p>Alegeți unul dintre planurile de lecție de mai jos și organizați o activitate cu elevii dumneavoastră.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/RO/CNECT-2018-00222-00-04-RO-TRA-00.DOCX">Activitatea 1&nbsp;&ndash; Dezvoltarea g&acirc;ndirii matematice pentru &icirc;nvățăm&acirc;ntul primar</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/RO/CNECT-2018-00222-00-05-RO-TRA-00.DOCX">Activitatea 2&nbsp;&ndash; Familiarizarea cu algoritmi pentru &icirc;nvățăm&acirc;ntul gimnazial</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/RO/CNECT-2018-00222-00-06-RO-TRA-00.DOCX">Activitatea 3 &ndash; Algoritmi pentru &icirc;nvățăm&acirc;ntul liceal</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection