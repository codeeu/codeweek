<?php

namespace App\Mail;

use App\Event;
use App\LeadingTeacherAction;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeadingTeachingActionAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $action;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LeadingTeacherAction $action)
    {
        $this->action = $action;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("A new action has been created by a Leading Teacher")
            ->markdown('emails.en.leading-teacher-action-created');
    }
}
