<?php
/**
 * Created by PhpStorm.
 * User: diddy
 * Date: 4/25/2016
 * Time: 1:58 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

    class HubtelServiceProvider extends ServiceProvider {


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path().'/Hubtel/*.php') as $filename){
            require_once($filename);
        }
    }
}