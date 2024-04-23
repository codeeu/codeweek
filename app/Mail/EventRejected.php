<?php

namespace App\Mail;

use App\Event;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $user;

    public $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, User $user, $reason)
    {
        $this->event = $event;
        $this->user = $user;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {

        $locale = session('locale');
        if (empty($locale)) {
            $locale = \Config::get('app.fallback_locale');
        }
        $view = 'emails.'.$locale.'.event-rejected';
        if (! view()->exists($view)) {
            $default_language = \Config::get('app.fallback_locale');
            $view = 'emails.'.$default_language.'.event-rejected';
        }

        $subject = \Lang::get('email.subjects.rejected');

        return $this
            ->subject($subject)
            ->markdown($view);

    }
}
