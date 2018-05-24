@extends('layout.base')

@section('content')
    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">
            <h3>Report your #codeEU event</h3>
            <header class="flex flex-col justify-between">
                <p class="mb-4 text-grey-dark">
                    Event: {{$event->title}} {{$event->start_date}}( September 29, 2017 at 14:17 )</p>

                <p class="mb-4 text-grey-dark">
                    You can fill this form only once! Please check your data carefully. If you make a mistake, contact us.</p>

                <p class="mb-4 text-grey-dark">After submitting the report, a personalized certificate for participation in Code Week will be issued automatically and will become available for you to download or share. You can see an example certificate here.</p>

                <p class="mb-4 text-grey-dark">    Required fields are marked with an * asterisk.</p>

            </header>
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <div class="block text-grey-darker text-3xl font-normal mb-2" for="participants_count">
                                Participants count
                            </div>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                                   id="participants_count" type="text" placeholder="Participants Count">
                            Required. Please provide a rough estimate, even if you don't have exact data. A number greater than 0.
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
                                Submit Event Report
                            </button>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection