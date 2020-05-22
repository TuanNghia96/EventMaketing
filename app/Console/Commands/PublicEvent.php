<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class PublicEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'public:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Public event';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $events = Event::where('public_date', now()->format('Y-m-d H:i'))->get();
        $this->info($events->count() . ' events publict at: '. now()->format('Y-m-d H:i'));
        foreach ($events as $event) {
            $event->update(['status' => Event::PUBLIC]);
            $this->info('   -Name:' . $event->name . ' code:' . $event->code);
        }
    }
}
