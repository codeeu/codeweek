<?php

namespace App\Mail;

use App\Event;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, User $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $locale = session('locale');
        if (empty($locale)){
            $locale = \Config::get('app.fallback_locale');
        }
        $view = 'emails.'.$locale.'.event-registered';
        if(!view()->exists($view)){
            $default_language = \Config::get('app.fallback_locale');
            $view = 'emails.' . $default_language . '.event-registered';
        }

        $subject = \Lang::get('email.subjects.registered');

        return $this
            ->subject($subject)
            ->markdown($view);
    }
}
