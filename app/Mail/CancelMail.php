<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $event;
    protected $reason;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @param $event
     * @param $reason
     * @param $url
     */
    public function __construct($event, $reason, $url)
    {
        $this->event = $event;
        $this->reason = $reason;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->event->mainEnp()->first()->name;
        $reason = $this->reason;
        $event = $this->event;
        $url = $this->url;
        return $this->view('mail.cancel_mail', compact('name', 'reason', 'event', 'url'));
    }
}
