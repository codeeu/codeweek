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
                    <select id="id_city" name="selectedCity" class="codeweek-input-select" wire:model="selectedCity">
                        <option value="">Choose your city</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedCity'])@endcomponent
                </div>
            </div>
            @endif

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="selectedLevels">* What level of students do you teach ?</label>
                    <select name="selectedLevels" id="selectedLevels" multiple size="6" class="codeweek-input-select" wire:model="selectedLevels" style="height:140px">
                        @foreach($levels as $level)
                            <option value="{{$level['id']}}">{{__("resources.resources.levels.{$level['name']}")}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedLevels'])@endcomponent
                </div>
            </div>

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="selectedSubjects">* What subject(s) do you teach ?</label>
                    <select name="selectedSubjects" id="selectedSubjects" multiple size="6" class="codeweek-input-select" wire:model="selectedSubjects" style="height:140px">
                        @foreach($subjects as $subject)
                            <option value="{{$subject['id']}}">{{$subject['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedSubjects'])@endcomponent
                </div>
            </div>

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="selectedExpertises">What are your expertise(s)</label>
                    <select name="selectedExpertises" id="selectedExpertises" multiple size="6" class="codeweek-input-select" wire:model="selectedExpertises" style="height:170px">
                        @foreach($expertises as $expertise)
                            <option value="{{$expertise['id']}}">{{$expertise['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedExpertises'])@endcomponent
                </div>
            </div>

            <div class="codeweek-form-field-privacy">
                <label>
                    <input id="isLeadingTeacher" name="isLeadingTeacher" wire:model="isLeadingTeacher"
                           type="checkbox">
                    I declare that I am currently a Leading Teacher for EU Code Week.
                    <div style="color: red; margin-top:-20px;">
                    @component('components.validation-errors', ['field'=>'isLeadingTeacher'])
                        @endcomponent
                </div>
                </label>

            </div>


            <div class="codeweek-form-field-privacy">
                <label>
                    <input id="checkPrivacy" name="privacy" wire:model="privacy"
                           type="checkbox">
                    By ticking this box, I confirm that I have read and consent with the <a href="/privacy" target="_blank">treatment of the personal information</a>. <br/>
                    I have shared in this form and namely with the publication of that on the codeweek.eu. I understand that this information is shared in order to give better visibility to the Leading Teachers and allow interested teachers and individuals to contact me for specific questions or queries regarding the EU Code Week initiative.
                    <div style="color: red; margin-top:-20px;">
                @component('components.validation-errors', ['field'=>'privacy'])
                        @endcomponent
            </div>
                </label>

            </div>



            <div class="codeweek-form-button-container">
                <div class="codeweek-button">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </div>

    </form>
</div>

