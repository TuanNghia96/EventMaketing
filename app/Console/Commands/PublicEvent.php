<?php

namespace App\Console\Commands;

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
        $this->info('Process success in: ' . now());
    }
}
