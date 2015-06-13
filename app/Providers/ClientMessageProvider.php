<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/6/15
 * Time: 6:18 PM
 * To change this template use File | Settings | File Templates.
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Message\ClientMessage;

class ClientMessageProvider extends  ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('clientMessage',function(){
           return new ClientMessage;
       });
    }
}