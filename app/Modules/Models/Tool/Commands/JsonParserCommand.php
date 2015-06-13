<?php

namespace Models\Tool\Commands;

use App\Commands\Command;

class JsonParserCommand extends Command
{

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public  $converter;

    public function __construct($converter)
    {
        //dependency injected object
        //core's class to convert json to object
        //path: app/Cores/JsonParser/Converter.php
        $this->converter = $converter;
    }


}
