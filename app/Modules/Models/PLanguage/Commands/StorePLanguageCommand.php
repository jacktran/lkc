<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/11/15
 * Time: 9:09 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\PLanguage\Commands;

use Models\PLanguage\PLanguageRepository;

use App\Commands\Command;

class StorePLanguageCommand extends Command
{
    private $pLanguageRepository;

    public function getPLanguageRepository()
    {
        return $this->pLanguageRepository;
    }

    private $rootName;

    public function getRootName()
    {
        return $this->rootName;
    }

    private $structure;

    public function getStructure()
    {
        return $this->structure;
    }

    private $namePattern;

    public function getNamePattern()
    {
        return $this->namePattern;
    }

    private $name;

    public function getName()
    {
        return $this->name;
    }


    function __construct($request,$pLanguageRepository)
    {
        $this->name = $request->get('name');
        $this->namePattern = $request->get('name_pattern');
        $this->structure = $request->get('structure');
        $this->rootName = $request->get('root_name');
        $this->pLanguageRepository = $pLanguageRepository;
    }

}
