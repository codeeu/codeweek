<?php

namespace App\Livewire;

use App\Helpers\EventHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use TallStackUi\Traits\Interactions;

class ModerateActivity extends Component
{
    use Interactions;

    public $event;
    public $refresh = false;
    public $pendingCounter;

    public $status;
    public $showModal = false;
    public $showDeleteModal = false;
    public $rejectionText = '';
    public $rejectionOption = "";
    public $rejectionOptions = [];

    public function mount($event, $refresh = false)
    {
        $this->event = $event;
        $this->refresh = $refresh;
        $this->pendingCounter = EventHelper::getPendingEventsCount();

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
        $this->toast()->success('Activity has been approved')->send();

        $this->reRender();

    }

    public function deleteEvent()
    {
        $this->event->remove();

        session()->flash('message', 'Event Deleted and email sent!');
        $this->reRender();
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
        $this->toast()->info('Event Rejected!')->send();
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

            return redirect()->to(auth()->user()->getNextPendingEvent($this->event)->path());
        }
    }

    public function render()
    {
        return view('livewire.moderate-activity');
    }
}
