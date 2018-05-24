@extends('layout.base')

@section('content')

    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">
            <h3>CodeWeekEU Ambassadors</h3>
            <header class="flex flex-col justify-between">
                <p class="mb-4 text-grey-dark">Please fill in and submit this form in order to express your willingness
                    to serve as CodeWeekEU Ambassador.
                    Serving as an ambassador means spreading the vision of CodeWeek, acting as a volunteer to promote
                    coding
                    literacy in your country, encourage the organization of CodeWeek events, promote local events, work
                    with
                    national and local communities.</p>

                <p class="mb-4 text-grey-dark">We need active ambassadors in each country to make CodeWeekEU a success. Here is the
                    list of current
                    CodeWeek Ambassadors: http://events.codeweek.eu/ambassadors/. We are integrating the list in view of
                    the
                    upcoming edition.</p>

                <p class="mb-4 text-grey-dark">For organizational reasons we need to identify a main contact (i.e., a coordinator, or
                    national ambassador)
                    in each country. That's the reason why there a field called "Role" in which you are asked to specify
                    whether
                    you volunteer to serve as a national coordinator (option that will be taken into consideration only
                    for
                    countries that have no ambassadors yet), or as a local support. In this latter case we ask you to
                    specify
                    which is the area (e.g., state, region) in which you want to operate.</p>
            </header>
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <div class="block text-grey-darker text-3xl font-normal mb-2" for="firstname">
                                First name
                            </div>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                   id="firstname" type="text" placeholder="First Name">
                        </div>
                        {{--<div class="mb-6">--}}
                        {{--<label class="block text-grey-darker text-sm font-bold mb-2" for="password">--}}
                        {{--Password--}}
                        {{--</label>--}}
                        {{--<input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">--}}
                        {{--<p class="text-red text-xs italic">Please choose a password.</p>--}}
                        {{--</div>--}}
                        <div class="flex items-center justify-between mt-8">
                            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded"
                                    type="button">
                                Sign In
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker"
                               href="#">
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


@endsection