<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/12/15
 * Time: 12:13 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\PLanguage\CommandHandlers;

use Models\PLanguage\Commands\ShowPLanguageCommand;

class ShowPLanguageCommandHandler
{
    public function  handle(ShowPLanguageCommand $command)
    {
        $type = $command->getType();
        $columns = array('id', 'name');
        switch ($type) {
            case 'all':
                return $command->getPLanguageRepository()->getAll($columns);
                break;
            case 'at':
                return $command->getPLanguageRepository()->findBy($columns, $command->getField(), $command->getValue());
                break;
        }
    }
}
