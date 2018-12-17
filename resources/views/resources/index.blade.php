@extends('layout.base')

@section('content')
    <section>

        <div class="container resources-container">

            <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                <h1>New Resources</h1>
                <span>EU Code Week 2018</span>
            </div>

            <hr>

            <p>EU Code Week is a grass-root movement run by volunteers who promote coding in their countries as <a
                        href="http://events.codeweek.eu/ambassadors">Code Week Ambassadors</a>. Anyone – schools,
                teachers,
                libraries, code clubs, businesses, public authorities – can organise a #CodeEU event and add it to the
                <a
                        href="http://codeweek.eu/">codeweek.eu</a> map. To make organising and running coding events
                easier, we
                have prepared different toolkits and selected some of the best lesson plans, guides and other resources.
            </p>

            <multiselect :options="{{ $audiences }}" value="{{ old('audience') }}" name="audience"></multiselect>
            <multiselect :options="{{ $levels }}" value="{{ old('levels') }}" name="level"></multiselect>




            </multiselect>


        </div>
    </section>


@endsection
