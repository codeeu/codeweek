<!-- Main Banner Section Start -->

<section class="home-map">

    <div id="home-map"></div>
    <div id="past-events">
        Show events for


        <select id="id_year" name="year">
            @foreach($years as $year)
                <option value="{{$year}}" {{ ($year==$selectedYear)?'selected':''}}>{{$year}}</option>
            @endforeach
        </select>


    </div>

    {{--<div class="search-inner">--}}
        {{--<div class="container">--}}
            {{--<form class="form-verticle">--}}
                {{--<div class="col-md-4 col-sm-4 no-padd">--}}
                    {{--<input type="text" class="form-control left-radius right-br" placeholder="{{__('Keywords')}}..">--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-3 no-padd">--}}
                    {{--<input type="text" class="form-control right-br" placeholder="{{__('Location')}}..">--}}

                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-3 no-padd">--}}
                    {{--<select class="selectpicker form-control" data-live-search="true">--}}
                        {{--<option data-tokens="ketchup mustard">@lang('Choose Category')</option>--}}
                        {{--<option data-tokens="mustard">{{__('Burger, Shake and a Smile')}}</option>--}}
                        {{--<option data-tokens="frosting">{{__('Sugar, Spice and all things nice')}}</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="col-md-2 col-sm-2 no-padd">--}}
                    {{--<button type="button"--}}
                            {{--class="btn theme-btn btn-default height-50 full-width">{{ __('Search') }}</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
</section>
<div class="clearfix"></div>
<!-- Home Map End -->

@push('scripts')

    <script type="text/javascript">
        $('#id_year').on('change', function () {
            window.location = window.App.url + '/events?year=' + this.value;

        })
    </script>
    <script type="text/javascript"
            src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZivlK6i8_JWt15x-BewfW9Vw2mhWPd7o"></script>
    <script src="{{asset('js/map-index.js')}}"></script>
@endpush