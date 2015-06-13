<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/6/15
 * Time: 6:10 PM
 * To change this template use File | Settings | File Templates.
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ClientMessageFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'clientMessage';
    }
}
