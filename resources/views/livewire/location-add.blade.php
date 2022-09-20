<div>
    <label for="location" class="block text-sm font-medium text-gray-700">Country</label>

    <select id="country" name="country"
            class="bg-gray-100 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
        @foreach($countries as $country)
            <option value="{{$country->iso}}">{{$country->name}}</option>
        @endforeach
    </select>
</div>


