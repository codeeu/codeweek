<?php

namespace App\Http\Livewire;

use App\LeadingTeacherAction;
use Illuminate\Support\Carbon;
use Livewire\Component;

class LeadingTeacherReportForm extends Component
{

    public $action_title;
    public $action_type;
    public $action_date;
    public $action_comment;

    public function mount()
    {
        $this->action_type = '';
        $this->action_date = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.leading-teacher-report-form');
    }

    protected $rules = [
        'action_title' => 'required',
        'action_type' => 'required',
        'action_date' => 'required',
        'action_comment' => 'present',
    ];

    public function submit()
    {

        $this->validate();


        LeadingTeacherAction::create([
            "title" => $this->action_title,
            "type" => $this->action_type,
            "comment" => $this->action_comment,
            "completion_date" => $this->action_date,
            "user_id" => auth()->user()->id
        ]);

        return redirect()->to('/leading-teachers/dashboard');

    }
}
