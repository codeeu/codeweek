<select class="search-form-element" id="id_country" name="country_iso" onchange="this.form.submit()">
    <option value=""> @lang('countries.all')</option>
    <option value="">---------------</option>

    @foreach($countries as $country)
        <option value="{{$country->iso}}"
                {{ ($country_iso == $country->iso)?'selected':'' }}
        >@lang('countries.'. $country->name)</option>
    @endforeach


</select>