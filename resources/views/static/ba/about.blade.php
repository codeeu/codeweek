@extends('layout.base') @section('content')<section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>O SEDMICI KODIRANJA</h1><span></span></div>

                    <hr>


                    <p>Tokom 2019, Sedmica kodiranja EU će se odvijati od <strong>5. do 20. oktobra</strong>.</p>

                    <p>Sedmica kodirnja EU je pokret &scaron;irokih masa u kom se slavi kreativnost, rje&scaron;avanje problema i saradnja putem programiranja i drugih tehnolo&scaron;kih aktivnosti. Zamisao je da se programiranje načini vidljivijim, da se mladima, odraslima i starijima pokaže kako kodiranjem mogu svoje ideje sprovesti u realnost, da se te vje&scaron;tine demistificiraju i da se okupe oni koji su motivirani za učenje.</p>

                    <h2>Vode je volonteri</h2>

                    <p>Sedmicu kodiranja EU vode volonteri. Jedan, ili nekoliko <a href="/ambassadors">ambasadora Sedmice kodiranja</a> koordinira tu inicijativu u svojiim zemljama, ali svako može organizirati svoju vlastitu aktivnosti i dodavati i svoj doprinos na mapi <a href="/">codeweek.eu</a>.</p>

                    <h2>Podržava je Evropska komisija</h2>

                    <p>Sedmicu kodiranja EU su 2013. pokrenuli Mladi savjetnici za digitalnu agendu Evrope. Evropska komisija podržava Sedmicu kodiranja EU u sklopu svoje strategije za <a href="http://ec.europa.eu/priorities/digital-single-market/">Digitalno jedinstveno trži&scaron;te</a>, U okviru <a href="https://ec.europa.eu/education/initiatives/european-education-area/digital-education-action-plan_en">Akcionog plana za digitalnu edukaciju</a> Komisija posebno podstiče &scaron;kole da se pridruže toj inicijativi. Cilj je do 2020 godine obuhvatiti 50% &scaron;kola u Evropi.</p>

                    <h2>&Scaron;kole</h2>

                    <p>&Scaron;kole na svim nivoima i nastavnici svih predmeta se posebno pozivaju na uče&scaron;će u Sedmici kodiranja EU, kako bi svojim učenicima pružili mogućnost da istražuju digitalnu kreativnost i kodiranje. Saznajte ne&scaron;to vi&scaron;e o toj inicijativi i o tome kako organizirati svoju aktivnostu putem mrežne stranice posvećene nastavnicima: <a href="/schools">CodeWeek.eu/Schools</a></p>

                    <h2>Za&scaron;to kodiranje?</h2>

                    <p>Radi se o Pii, koja je mislila da mora studirati pravo, iako je uvijek uživala u matematici i igranju s kompjuterima. Radi se o Marku, koji ima zamisao o jednoj boljoj dru&scaron;tvenoj mreži, ali je ne može izgraditi sam. Radi se o Alice, koja sanja o tome da pravi robote jer joj roditelji ne dozvoljavaju da ima mačku.</p>

                    <p>Radi se o onima od vas koji već pomažu u ostvarivanju tih snova.</p>

                    <p>U stvari, radi se o svima nama. O na&scaron;oj budućnosti. Tehnologija oblikuje na&scaron;e živote, ali dopu&scaron;tamo manjini da odučuje o tome za &scaron;ta i kako je koristimo. Možemo mi i bolje, a ne samo da dijelimo i lajkujemo stvari. Možemo stvarno realizirati svoje lude ideje, graditi stvari koje će obradovati druge.</p>

                    <p>Nikad nije bilo lak&scaron;e napraviti svoju vlastitu aplikaciju, sagraditi svog vlastitog robota ili izmisliti leteće automobile, za&scaron;to ne! To nije lagano putovanje, ali jest putovanje puno kreativnih izazova, zajednice koja pruža potporu i jako je zabavno. Jeste li spremni prihvatiti izazov i postati stvoritelj?</p>

                    <p>Kodiranje također doprinosi razvijanju sposobnosti poput računarskog razmi&scaron;ljanja, rje&scaron;avanja problema, kreativnosti i timskog rada - &scaron;to su stvarno dobre vje&scaron;tine za sva životna usmjerenja.</p>

                    <p>Aleksandro Bogliolo, koordinator tima Sedmice kodiranja EU od ambasadora volontera, izjavio je:<blockquote>
                            <p>'Od samog početka mi smo uradili mnogo stvari sa kamenom, željezom, papirom i olovkama da smo transformisali svoje živote. Sad živimo u drugom dobu gdje je na&scaron; svijet oblikovan u kodiranju. Različita doba imaju različite zahtjeve u smislu poslova i vje&scaron;tina. Tokom Sedmice kodiranja mi želimo svakom Evropljaninu dati &scaron;ansu da otkrije kodiranje i da se njime zabavi.  Naučimo kodirati kako bismo oblikovali svoju budućnost.'</p>
                        </blockquote>
                    </p>

                    <h2>Sedmica kodiranja u ciframa</h2>

                    <p>U Sedmici kodiranja EU 2018. učestvovalo je 2,7 miliona ljudi iz preko 70 zemalja &scaron;irom svijeta. Dodatnih 2,3 miliona mladih ljudi bilo je angažirano u <a href="http://africacodeweek.org/">Sedmici kodiranja u Africi</a>, koja predstavlja srodnu inicijativu koju vode SAP i neprofitne organizacije.</p>

                    <p>Ako va&scaron;a zemlja jo&scaron; uvijek nije angažirana, vi možete organizirati događaje i staviti je na <a href="/events">mapu</a> ili <a href="mailto:info@codeweek.eu">volontirati</a> kao ambasador Sedmice kodiranja.</p>

                    <div class="container clearfix">
                        <div class="col_half" id="PeopleChart" style="opacity: 1;width: 100%;text-align: center">
                            <h3 class="center">Učesnici</h3>
                            <img src="{{asset('img/participation-2018.gif')}}">
                        </div>
                    </div>


                    <h2>Pridružite se Sedmici kodiranja EU</h2>

                    <p>Pridružite se Sedmici kodiranja EU <a href="/guide">tako &scaron;to ćete organizirati aktivnosti kodiranja</a> u svom gradu, pridružiti se <a href="/codeweek4all">Izazovu Sedmice kodiranja za sve</a> i povezivati aktivnosti kroz zajednice i preko granica, ili nam pomoći da pro&scaron;irujemo viziju Sedmice kodiranja kao <a href="/ambassadors">ambasador Sedmice kodiranja EU</a> za svoju zemlju!</p>


                    @include("static.toolkits")

                </div>
            </div>
        </div>
    </section>@endsection