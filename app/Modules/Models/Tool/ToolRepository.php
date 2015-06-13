<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/2/15
 * Time: 10:44 AM
 * To change this template use File | Settings | File Templates.
 */


namespace Models\Tool;

use Modules\Infrastructure\EloquentRepository;

class ToolRepository extends EloquentRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return __NAMESPACE__ . '\Tool';
    }
}