<?php

namespace App\Console\Commands;

use App\StreamFeed;
use App\User;
use App\WatchedShop;
use Illuminate\Console\Command;

class DeleteFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete User Stream Feed';

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
        //
        WatchedShop::truncate();
//        $user_id = User::whereName($this->argument('name'))->first()->id;
//        $stream = new StreamFeed($user_id);
//        $stream->deleteFeed();
    }
}
