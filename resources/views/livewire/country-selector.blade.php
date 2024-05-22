<div>
    <x-select.native wire:model.change="selected_country" class="codeweek-input-select" id="id_country" name="country_iso">
        <option value=""> All countries</option>
        <option disabled value="---">--------------------------</option>
        @foreach ($countries as $country)
            <option value="{{ $country->iso }}">{{ $country->name }} ({{ $country->total }})</option>
        @endforeach
    </x-select.native>
</div>
