
<select class="search-form-element" id="id_country" name="country_iso">
    <option value=""> All countries</option>
    <option value="">---------------</option>

    @foreach($countries as $country)
        <option value="{{$country->iso}}"
        {{ ($country_iso == $country->iso)?'selected':'' }}
                >{{$country->name}}</option>
        @endforeach


</select>