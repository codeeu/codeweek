<div>
    <form enctype="multipart/form-data" id="signupform" role="form"
          class="codeweek-form"
          wire:submit="submit">


        <div class="codeweek-form-inner-container">


            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="account_email">Your email address</label>

                    <input id="email"
                           name="account_email"
                           type="text"
                           style="background: #dedede"
                           wire:model.live="email"
                           readonly>
                </div>

            </div>

            @component('components.report.form-field-LT',['label'=>'First Name','field_name'=>'first_name','type'=>'text','required'=>true])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Last Name','field_name'=>'last_name','type'=>'text','required'=>true])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Twitter Handle','field_name'=>'twitter','type'=>'text','required'=>false])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Leading Teacher Tag','field_name'=>'tag','type'=>'text','required'=>true, 'info'=>'Please add your Leading Teacher Tag or create a new one [Country Code-Last Name-Three random digits] for example: BE-Andronikidis-005'])@endcomponent


            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="id_country">* Country</label>
                    <select id="id_country" name="selectedCountry" class="codeweek-input-select" wire:model.live="selectedCountry">
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
                    <label for="id_city">* Closest City</label>
                    <select id="id_city" name="selectedCity" class="codeweek-input-select" wire:model.live="selectedCity">
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
                    <label for="selectedLevels">* What level(s) of students do you teach ?</label>
                    <select name="selectedLevels" id="selectedLevels" multiple size="6" class="codeweek-input-select" wire:model.live="selectedLevels" style="height:140px">
                        @foreach($levels as $level)
                            <option value="{{$level['id']}}">{{__("resources.resources.levels.{$level['name']}")}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="info">
                    To select more than one answer, please press Ctrl and your choices
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedLevels'])@endcomponent
                </div>
            </div>

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="selectedSubjects">* What subject(s) do you teach ?</label>
                    <select name="selectedSubjects" id="selectedSubjects" multiple size="6" class="codeweek-input-select" wire:model.live="selectedSubjects" style="height:140px">
                        @foreach($subjects as $subject)
                            <option value="{{$subject['id']}}">{{$subject['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="info">
                    To select more than one answer, please press Ctrl and your choices
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedSubjects'])@endcomponent
                </div>
            </div>

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="selectedExpertises">What are your expertise(s)</label>
                    <select name="selectedExpertises" id="selectedExpertises" multiple size="6" class="codeweek-input-select" wire:model.live="selectedExpertises" style="height:170px">
                        @foreach($expertises as $expertise)
                            <option value="{{$expertise['id']}}">{{$expertise['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="info">
                    To select more than one answer, please press Ctrl and your choices
                </div>
                <div class="errors">
                    @component('components.validation-errors', ['field'=>'selectedExpertises'])@endcomponent
                </div>
            </div>

            <div class="codeweek-form-field-privacy">
                <label>
                    <input id="isLeadingTeacher" name="isLeadingTeacher" wire:model.live="isLeadingTeacher"
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
                    <input id="checkPrivacy" name="privacy" wire:model.live="privacy"
                           type="checkbox">
                    By ticking this box, I confirm that I have read and consent with the <a href="{{route('privacy-contact-points')}}" target="_blank">treatment of the personal information</a>. <br/>
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

