<?php

namespace App\Jobs;

use App\Mail\CancelMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendCancelMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event;
    protected $reason;

    /**
     * Create a new job instance.
     *
     * @param $event
     * @param $reason
     */
    public function __construct($event, $reason)
    {
        $this->event = $event;
        $this->reason = $reason;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = route('events.detail', $this->event->id);
        $email = new CancelMail($this->event, $this->reason, $url);
        Mail::to($this->event->mainSupplier()->first()->user()->first()->email)->send($email);
    }
}
