<!-- Main Banner Section Start -->

<section class="home-map">

    <div class="landing-wrapper" style="position: relative;height: 450px;">
        <div class="events-map-wrapper" style="position: absolute;width: 100%;height: 450px;">
            <div id="home-map"></div>
        </div>
    </div>
    <div id="past-events">
        @lang('event.show_events_for')

        <select id="id_year" name="year">
            @foreach($years as $year)
                <option value="{{$year}}" {{ ($year==$selectedYear)?'selected':''}}>{{$year}}</option>
            @endforeach
        </select>

    </div>

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