<?php

namespace App\Jobs;

use App\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Http\File;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class ProcessS3Images implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable
//        , SerializesModels
        ;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $image_name;
    protected $image;
    protected $type;

    public function __construct($image_name,$image,$type)
    {
        $this->image_name = $image_name;
        $this->image      = $image;
        $this->type       = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch($this->type){
            case"logo":
                echo "hello";
//                Store::storeImageToS3($this->image_name,$this->image);
//                Storage::putFileAs('photos', new File('/images/stores'), $this->image_name);
//                Storage::put($this->image_name, $this->image);
                break;
            case"banner":
                echo "hello";

//                Store::storeImageToS3($this->image_name,$this->image);
//                Storage::put($this->image_name, $this->image);
                break;
            case"product":
                Storage::put($this->image_name, $this->image);
                break;
        }
    }
}
