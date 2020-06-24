<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UrlHandler;

class deleteExpiredUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:expiredUrls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting expired Urls';

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
        UrlHandler::deleteExpiredUrls();
    }
}
