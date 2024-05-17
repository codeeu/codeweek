<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ModerateActivity extends Component
{
    public $event;
    public $refresh = false;
    public $pendingCounter;
    public $nextPending;
    public $status;
    public $showModal = false;
    public $showDeleteModal = false;
    public $rejectionText = '';
    public $rejectionOption = "";
    public $rejectionOptions = [];

    public function mount($event, $pendingCounter, $nextPending, $refresh = false)
    {
        $this->event = $event;
        $this->refresh = $refresh;
        $this->pendingCounter = $pendingCounter;
        $this->nextPending = $nextPending;
        $this->status = __('myevents.status.' . $event['status']);
        $this->rejectionOptions = [
            [
                'title' => __('moderation.description.title'),
                'text' => __('moderation.description.text'),
            ],
            [
                'title' => __('moderation.missing-details.title'),
                'text' => __('moderation.missing-details.text'),
            ],
            [
                'title' => __('moderation.duplicate.title'),
                'text' => __('moderation.duplicate.text'),
            ],
            [
                'title' => __('moderation.not-related.title'),
                'text' => __('moderation.not-related.text'),
            ],
        ];
    }


    public function approve()
    {
        $this->event->approve();
    }

    public function deleteEvent()
    {
        $this->event->remove();

        $redirectUrl = '/my';

        if (
            auth()
                ->user()
                ->can('approve', $this->event)
        ) {
            $redirectUrl = '/pending';
        }


        session()->flash('message', 'Event Deleted and email sent!');
        $this->refresh ? $this->reRender() : redirect()->to($redirectUrl);
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function toggleDeleteModal()
    {
        $this->showDeleteModal = !$this->showDeleteModal;
    }

    public function reject()
    {
        $this->event->reject($this->rejectionText);


        $this->toggleModal();
        $this->status = 'REJECTED';
        session()->flash('message', 'Event Rejected!');
        $this->reRender();
    }

    public function prefillRejectionText()
    {
        $this->rejectionText = $this->rejectionOption;
    }

    public function reRender()
    {
        if ($this->refresh) {
            return redirect(request()->header('Referer'));
        } else {
            return redirect()->to($this->nextPending);
        }
    }

    public function render()
    {
        return view('livewire.moderate-activity');
    }
}
