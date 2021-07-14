<div>
    <form enctype="multipart/form-data" id="reportform" role="form"
          class="codeweek-form"
          wire:submit.prevent="submit">


        <div class="codeweek-form-inner-container">


            @component('components.report.form-field-LT',['label'=>'Title of Action','field_name'=>'action_title','type'=>'text','required'=>true])@endcomponent

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="action_type">
                        * Type of Action
                    </label>
                    <select id="id_country" name="action_type"
                            class="codeweek-input-select" wire:model="action_type">
                        @if($action_type == '')
                            <option disabled selected value> -- Select an option --</option>
                        @endif
                        <option value="resource_submission">Resource Submission</option>
                        <option value="teacher_training">Teacher Training</option>
                        <option value="mooc_moderation">MOOC Moderation</option>
                    </select>
                </div>
                @if($errors->has('action_type'))
                    <div class="errors">
                        @component('components.validation-errors', ['field'=>'action_type'])@endcomponent
                    </div>
                @endif
            </div>

            <div class="codeweek-form-field-wrapper">
                <div class="codeweek-form-field">
                    <label for="action_date">
                        * Date of completion
                    </label>
                    <input type="date" wire:model="action_date" class="codeweek-input-select" style="flex:1;width:200px !important; background-image: none; background-position: right 10em top 50%, 0 0;">
                </div>
                @if($errors->has('action_type'))
                    <div class="errors">
                        @component('components.validation-errors', ['field'=>'action_type'])@endcomponent
                    </div>
                @endif
            </div>

                <div class="codeweek-form-field-wrapper">
                    <div class="codeweek-form-field">
                        <label for="action_comment">
                            Additional Comments
                        </label>
                        <textarea wire:model="action_comment" class="codeweek-input-select" style="flex:1;width:200px; height:200px; !important; background-image: none; background-position: right 10em top 50%, 0 0;" rows="4" cols="50"></textarea>
                    </div>
                    @if($errors->has('action_type'))
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'action_type'])@endcomponent
                        </div>
                    @endif
                </div>







            <div class="codeweek-form-button-container">
                <div class="codeweek-button">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </div>

    </form>
</div>
