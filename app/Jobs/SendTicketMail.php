<?php

namespace App\Jobs;

use App\Mail\SendTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendTicketMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $event;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @param $email
     * @param array $user
     * @param $event
     */
    public function __construct($email, $user, $event)
    {
        $this->email = $email;
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info($this->user['first_name'] . ' ' . $this->user['last_name']);
        $email = new SendTicket($this->user['first_name'] . ' ' . $this->user['last_name'], $this->event);
        Mail::to($this->email)->send($email);
    }
}
