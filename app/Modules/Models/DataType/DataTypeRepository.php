<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 9:15 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\DataType;

use Modules\Infrastructure\EloquentRepository;
use Models\DataType\DataTypeRepositoryInterface;

class DataTypeRepository extends EloquentRepository implements DataTypeRepositoryInterface
{
    public function  Model()
    {
        return __NAMESPACE__ . "\DataType";
    }

    public function getDataTypesByLanguageId($language_id)
    {
        return $this->model->where(array('p_language_id' => $language_id, 'active' => 1))
                           ->lists('name', 'key');
    }
}
