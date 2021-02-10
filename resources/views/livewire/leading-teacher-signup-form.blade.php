<div>
    <form enctype="multipart/form-data" id="signupform" role="form"
          class="codeweek-form"
          wire:submit.prevent="submit">


        <div class="codeweek-form-inner-container">


            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="account_email">Your email address</label>

                    <input id="email"
                           name="account_email"
                           type="text"
                           style="background: #dedede"
                           wire:model="email"
                           readonly>
                </div>

            </div>

            @component('components.report.form-field-LT',['label'=>'First Name','field_name'=>'first_name','type'=>'text','required'=>true])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Last Name','field_name'=>'last_name','type'=>'text','required'=>true])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Twitter Handle','field_name'=>'twitter','type'=>'text','required'=>false])@endcomponent


            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="id_country">* Country</label>
                    <select id="id_country" name="selectedCountry" class="codeweek-input-select" wire:model="selectedCountry">
                        <option value="">Choose your country</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->iso}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'country'])@endcomponent
                </div>
            </div>

            @if(!is_null($selectedCountry) && $selectedCountry !== '')
            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="id_city">* City</label>
                    <select id="id_city" name="city" class="codeweek-input-select" wire:model="city">
                        <option value="">Choose your city</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->country}} / {{$city->city}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'city'])@endcomponent
                </div>
            </div>
            @endif

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="id_audience">* Students Levels</label>
                    <select name="studentLevels" id="studentLevels" multiple size="6" class="codeweek-input-select" wire:model="studentLevels" style="height:140px">
                        @foreach($levels as $level)
                            <option value="{{$level['id']}}">{{$level['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'studentLevels'])@endcomponent
                </div>
            </div>


            <div class="codeweek-form-button-container">
                <div class="codeweek-button">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </div>

    </form>
</div>

