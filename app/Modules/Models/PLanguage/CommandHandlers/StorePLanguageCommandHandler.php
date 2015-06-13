<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/11/15
 * Time: 9:16 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\PLanguage\CommandHandlers;

use Models\PLanguage\Commands\StorePLanguageCommand;

class StorePLanguageCommandHandler
{
   public  function handle(StorePLanguageCommand $command)
   {
       return $command->getPLanguageRepository()->create(
            array(
                    'name' => $command->getName(),
                    'name_pattern' => $command->getNamePattern(),
                    'structure' => $command->getStructure(),
                    'root_name' => $command->getRootName(),
                )
        );
   }
}
