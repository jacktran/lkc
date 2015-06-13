<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Container\Container;
use View;
use Cache;



abstract class Controller extends BaseController
{

    use DispatchesCommands, ValidatesRequests;
}
