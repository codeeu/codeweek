@extends('layout.base')

@section('content')

    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">
            <h3>CodeWeekEU Ambassador</h3>
            <header class="flex flex-col justify-between">
                <p class="mb-4 text-grey-dark">Please fill in and submit this form in order to express your willingness
                    to serve as CodeWeekEU Ambassador.
                    Serving as an ambassador means spreading the vision of CodeWeek, acting as a volunteer to promote
                    coding
                    literacy in your country, encourage the organization of CodeWeek events, promote local events, work
                    with
                    national and local communities.</p>

                <p class="mb-4 text-grey-dark">We need active ambassadors in each country to make CodeWeekEU a success.
                    Here is the
                    list of current
                    CodeWeek Ambassadors: http://events.codeweek.eu/ambassadors/. We are integrating the list in view of
                    the
                    upcoming edition.</p>

            </header>
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST"
                          action="{{ route('volunteer_store') }}">
                        @csrf

                        <div class="flex items-center justify-center mx-auto mt-8">
                            @role('ambassador')

                            Thank you for being an ambassador !
                            @else
                                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded text-5xl"
                                        type="submit">
                                    Click here to Volunteer as an Ambassador
                                </button>
                                @endrole
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>


@endsection