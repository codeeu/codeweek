@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>O NEDELJI PROGRAMIRANJA</h1><span></span></div>

                    <hr>


                    <p>U 2019. godini EU nedelja programiranja će se održati između <strong>5. i 20. oktobra</strong>.</p>

                    <p>EU nedelja programiranja je samonikli pokret koji slavi kreativnost, re&scaron;avanje problema i saradnju kroz programiranje i druge aktivnosti u vezi sa tehnologijom. Ideja je da se programiranje učini vidljivijim i dostupnijim, da se pokaže mladima, odraslima i starijim osobama kako se ideje realizuju pomoću kodova, da se demistifikuje programiranje i okupe motivisani ljudi da uče zajedno.</p>

                    <h2>Volonteri u glavnoj ulozi</h2>

                    <p>EU nedelju programiranja vode volonteri. Jedan ili vi&scaron;e <a href="/ambassadors">ambasadora Nedelje programiranja</a> koordinira aktivnostima inicijative u svojoj zemlji, ali svako može da organizuje sopstveni događaj i da ga doda na <a href="/">codeweek.eu</a> mapu.</p>

                    <h2>EU nedelju programiranja podržava Evropska komisija</h2>

                    <p>EU nedelju programiranja su pokrenuli 2013. godine Mladi savetnici Evropske Digitalne Agende. Evropska komisija podržava EU nedelju programiranja kao deo strategije za <a href="http://ec.europa.eu/priorities/digital-single-market/">Jedinstveno digitalno trži&scaron;te</a>, i u okviru <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">Akcionog plana za digitalno obrazovanje</a> Evropska komisija posebno podstiče &scaron;kole da se pridruže inicijativi. Cilj je da se u inicijativu uključi 50% svih &scaron;kola u Evropi do 2020. godine.</p>

                    <h2>&Scaron;kole</h2>

                    <p>Posebno su pozvane sve &scaron;kole iz celokupnog obrazovnog sistema i svi predmetni nastavnici da učestvuju u EU nedelji programiranja kako bi pružili mogućnost svojim učenicima da istraže digitalnu kreativnost i programiranje. Saznajte vi&scaron;e o inicijativi i kako da organizujete aktivnost putem veb stranice posvećene nastavnicima: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Za&scaron;to programiranje?</h2>

                    <p>Zbog Pie, koja je osećala da mora da studira pravo, iako je oduvek uživala u matematici i igranju sa kompjuterima. Zbog Marka, koji ima ideju za bolju dru&scaron;tvenu mrežu, ali ne može sam da je napravi. Zbog Alise koja ma&scaron;ta da pravi robote jer joj roditelji ne dozvoljavaju da ima mačku.</p>

                    <p>Zbog onih među vama koji već pomažu da se ovi snovi ostvare.</p>

                    <p>Zapravo, zbog svih nas. Zbog na&scaron;e budućnosti. Tehnologija oblikuje na&scaron;e živote, ali dozvoljavamo da mali broj ljudi odluči kako i za &scaron;ta ćemo je koristiti. Možemo mnogo vi&scaron;e od toga nego da samo delimo i lajkujemo stvari. Možemo da sprovedemo sopstvene lude ideje u delo, da napravimo stvari koje će da donesu radost drugima.</p>

                    <p>Nikad nije bilo lak&scaron;e napraviti svoju aplikaciju, svog robota ili možda konačno izmisliti leteće automobile, za&scaron;to da ne! Iako učenje programiranja nije lagano, puno je kreativnih izazova, a uz podr&scaron;ku zajednice i veoma je zabavno. Da li ste spremni da prihvatite izazov i postanete stvaralac?</p>

                    <p>Programiranje pomaže u razvijanju kompetencija kao &scaron;to su računarsko razmi&scaron;ljanje, re&scaron;avanje problema, kreativnost i timski rad &ndash; ve&scaron;tine koje su neophodne u svim životnim sferama.</p>

                    <p>Alesandro Boljolo, koordinator tima ambasadora volontera EU nedelje programiranja, rekao je:<blockquote>
                            <p>&sbquo;&sbquo;Od početka čovečanstva napravili smo mnoge stvari koje su promenile na&scaron;e živote koristeći kamen, gvožđe, papir i olovku. Sada živimo u drugačijoj eri gde je na&scaron; svet kodiran. Različite ere zahtevaju drugačije poslove i ve&scaron;tine. Tokom Nedelje programiranja želimo da svakom Evropljaninu pružimo priliku da otkrije &scaron;ta je programiranje i da se zabavi programirajući. Naučimo kako da programiranjem oblikujemo na&scaron;u budućnost.&ldquo;</p>
                        </blockquote>
                    </p>

                    <h2>Nedelja programiranja u brojevima</h2>

                    <p>U 2018. godini, 2,7 miliona ljudi u vi&scaron;e od 70 zemalja &scaron;irom sveta učestvovalo je u EU nedelji programiranja. Dodatnih 2,3 miliona mladih je bilo angažovano u <a href="http://africacodeweek.org/">Afričkoj Nedelji programiranja</a>, koji predstavlja sestrinski projekat koji vode SAP i neprofitne organizacije.</p>

                    <p>Ako va&scaron;a zemlja jo&scaron; uvek nije uključena, možete organizovati događaje i dodati ih na <a href="/events">mapu</a> ili <a href="mailto:info@codeweek.eu">volontirati</a> kao ambasador Nedelje programiranja.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 1;width: 100%;text-align: center">
                            <h3 class="center">Učesnici</h3>
                            <img src="{{asset('img/participation-2018.gif')}}">
                        </div>
                    </div>


                    <h2>Pridružite se EU nedelji programiranja</h2>

                    <p>Pridružite se EU nedelji programiranja <a href="/guide">organizovanjem aktivnosti u vezi sa programiranjem</a> u svom gradu, učestvovanjem u <a href="/codeweek4all">izazovu Nedelja programiranja za sve</a> i povezivanjem aktivnosti sa zajednicama u zemlji i van nje, ili nam pomozite da ra&scaron;irimo viziju Nedelje programiranja kao <a href="/ambassadors">Ambasador EU nedelje programiranja</a> za va&scaron;u zemlju!</p>

                    @include("static.toolkits")


                </div>
            </div>
        </div>
    </section>@endsection