
<select class="search-form-element" id="id_country" name="country">
    <option value=""> All countries</option>
    <option value="">---------------</option>

    @foreach($countries as $country)
        <option value="{{$country->iso}}"
        {{ (session('country') == $country->iso)?'selected':'' }}
                >{{$country->name}}</option>
        @endforeach


</select>