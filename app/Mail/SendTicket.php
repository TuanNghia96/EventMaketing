<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $event;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param $event
     */
    public function __construct($name, $event)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::error($this->name);
        return $this->view('mail.ticket_mail')->with('name', $this->name);
    }
}
