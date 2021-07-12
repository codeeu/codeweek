<div>
    <form enctype="multipart/form-data" id="reportform" role="form"
          class="codeweek-form"
          wire:submit.prevent="submit">


        <div class="codeweek-form-inner-container">


            @component('components.report.form-field-LT',['label'=>'Title of Action','field_name'=>'action_title','type'=>'text','required'=>true])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Type of Action','field_name'=>'action_type','type'=>'text','required'=>true])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Date of Completion','field_name'=>'action_date','type'=>'text','required'=>false])@endcomponent
            @component('components.report.form-field-LT',['label'=>'Upload Files','field_name'=>'action_files','type'=>'text','required'=>false])@endcomponent


            <div class="codeweek-form-button-container">
                <div class="codeweek-button">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </div>

    </form>
</div>
