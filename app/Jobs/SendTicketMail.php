<?php

namespace App\Jobs;

use App\Mail\SendTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendTicketMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $event;
    protected $email;
    protected $url;

    /**
     * Create a new job instance.
     *
     * @param $email
     * @param array $user
     * @param $event
     */
    public function __construct($email, $user, $event, $url)
    {
        $this->email = $email;
        $this->user = $user;
        $this->event = $event;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendTicket($this->user['first_name'] . ' ' . $this->user['last_name'], $this->event, $this->url);
        Mail::to($this->email)->send($email);
    }
}
