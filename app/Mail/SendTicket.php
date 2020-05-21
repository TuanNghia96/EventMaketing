<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $event;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param $event
     * @param $url
     */
    public function __construct($name, $event, $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $message= $this;
        $url =  $this->url;
        return $this->view('mail.ticket_mail', compact('name', 'message', 'url'));
    }
}
