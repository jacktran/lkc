<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 9:15 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\Collection;

use Modules\Infrastructure\EloquentRepository as EloquentRepository;
use Models\Collection\CollectionRepositoryInterface as CollectionRepositoryInterface;

class CollectionRepository extends EloquentRepository implements CollectionRepositoryInterface
{
    public function  Model()
    {
        return __NAMESPACE__ . "\Collection";
    }

    public  function  getCollectionsByLanguageId($language_id)
    {
        return $this->model->where(array("p_language_id" => $language_id,"active" => 1))
                           ->select(array("id","name","is_default"))
                           ->get();

    }

}
