<?php

namespace App\Http\Livewire;

use App\LeadingTeacherAction;
use Livewire\Component;

class LeadingTeacherReportForm extends Component
{

    public $action_title;
    public $action_type;
    public $action_date;

    public function render()
    {
        return view('livewire.leading-teacher-report-form');
    }

    protected $rules = [
        'action_title' => 'required',
        'action_type' => 'required'

    ];

    public function submit()
    {

        $this->validate();


        LeadingTeacherAction::create([
            "title" => $this->action_title,
            "type" => $this->action_type,
            "user_id" => auth()->user()
        ]);



    }
}
