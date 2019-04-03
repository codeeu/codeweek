<?php

namespace App\Mail;

use App\ResourceItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResourceSuggested extends Mailable
{
    use Queueable, SerializesModels;

    public $resourceItem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ResourceItem $resourceItem)
    {
        $this->resourceItem = $resourceItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("[CodeWeek] A new resource has been suggested")
            ->markdown('emails.en.resource-suggested');
    }
}
