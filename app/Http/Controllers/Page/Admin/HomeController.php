<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/24/15
 * Time: 8:25 PM
 * To change this template use File | Settings | File Templates.
 */
namespace  App\Http\Controllers\Page\Admin;

use  App\Http\Controllers\Controller as Controller;

use View;

use ClientMessage;

class HomeController extends Controller
{
    public function  showWelcome()
    {
        return view::make('admin.index1');
    }
}
