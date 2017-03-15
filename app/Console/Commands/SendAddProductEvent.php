<?php

namespace App\Console\Commands;

use App\Events\ProductFeedsEvent;
use Illuminate\Console\Command;

class SendAddProductEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:product {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send  product event';

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
        event(new ProductFeedsEvent());
    }
}
