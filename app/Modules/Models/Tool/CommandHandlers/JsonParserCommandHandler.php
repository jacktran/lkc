<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/10/15
 * Time: 3:49 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\Tool\CommandHandlers;

use Models\Tool\Commands\JsonParserCommand;

class JsonParserCommandHandler
{
    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(JsonParserCommand $jsonParserCommand)
    {
        return $jsonParserCommand->converter->JSONAnalyzer();
    }

}
