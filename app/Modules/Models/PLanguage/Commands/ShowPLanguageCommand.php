<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/12/15
 * Time: 12:12 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\PLanguage\Commands;

use App\Commands\Command;


class ShowPLanguageCommand extends Command
{
    // repository to interact with database
    private $pLanguageRepository;

    // get repository
    public function getPLanguageRepository()
    {
        return $this->pLanguageRepository;
    }

    /**
     * type to get data from database
     * such as : 'all' is get all data from database
     *            'at' is get data at specific condition
     */
    private $type;

    // get type
    public function getType()
    {
        return $this->type;
    }

    /**
     *  condition to get data from database
     *  only use when $type == 'at'
     */
    private $field;

    // get column
    public function getField()
    {
        return $this->field;
    }

    /**
     * value of condition to get data from database
     * only use when $type == 'at' and $column != empty
     */
    private  $value;

    // get value
    public function getValue()
    {
        return $this->value;
    }


    /**
     * @param $pLanguageRepository
     * @param string $type
     * @param string $field
     * @param string $value
     */
    public function __construct($pLanguageRepository, $type = 'all', $field ='', $value ='')
    {
        $this->pLanguageRepository = $pLanguageRepository;
        $this->type = $type;
        $this->field = $field;
        $this->value = $value;

    }

}
