<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 9:15 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\DataTypeKey;

use Modules\Infrastructure\EloquentRepository;

use Models\DataTypeKey\DataTypeKeyRepositoryInterface;

class DataTypeKeyRepository extends EloquentRepository implements DataTypeKeyRepositoryInterface
{
    public function  Model()
    {
        return __NAMESPACE__ . "\DataTypeKey";
    }
}
