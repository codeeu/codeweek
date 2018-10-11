@extends('layout.base')

@section('content')
    <section>
        <div class="container">

            @include ('resources.title')

            <ul>
                <li><a href="http://codeweek.it/">CodeWeek.it</a> Il sito italiano di CodeWeek</li>
                <li><a href="https://www.facebook.com/CodeWeekIT/">CodeWeek Italia</a> Pagina Facebook ufficiale di CodeWeek Italia</li>
                <li><a href="http://programmailfuturo.it/">Programma il futuro!</a> Portale gestito da CINI e MIUR per offrire alle scuole italiane le risose di Code.org</li>
                <li><a href="http://codemooc.org/risorse">Coding in Your Classroom, Now!</a> Portale web per insegnanti dedicato al coding a scuola.</li>
                <li><a href="https://codeweek.eu/resources/">Risorse internazionali localizzate in italiano</a> Molte delle risorse online disponibili a livello internazionale hanno localizzazione linguistica in italiano</li>
                <li><a href='https://www.apple.com/105/media/it/education/codeweek2018/IncredibleCodeMachine_guide_092418_Final_it.pdf' target='_blank'>La Macchina del codice con Swift Playgrounds - Guida per il trainer</a>: Festeggia la Settimana europea della programmazione ospitando un evento con Swift Playgrounds su iPad.</li>
                <li><a href="https://mooc.uniurb.it/wp/codeweekmooc/">CodeWeek nanoMOOC: Il coding da zero a CodeWeek e oltre!</a> Brevissimo corso di formazione online accreditato per insegnanti, che guida passo passo alla partecipazione a Europe Code Week</li>
            </ul>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/u9Hb4UBp4C0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

        </div>
    </section>
@endsection
