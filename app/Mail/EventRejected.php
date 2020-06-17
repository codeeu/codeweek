<?php

namespace App\Mail;

use App\Event;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventRejected extends Mailable
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
        $view = 'emails.'.$locale.'.event-rejected';
        if(!view()->exists($view)){
            $default_language = \Config::get('app.fallback_locale');
            $view = 'emails.' . $default_language . '.event-rejected';
        }

        $subject = \Lang::get('email.subjects.rejected');

        return $this
            ->subject($subject)
            ->view($view);

    }
}
