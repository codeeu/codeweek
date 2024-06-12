<?php

namespace App\Livewire;

use Livewire\Component;

class QuestionComponent extends Component
{
    public $question;
    public $isOpen = true;

    public function mount($question)
    {
        $this->question = $question;
    }

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.question-component');
    }
}
