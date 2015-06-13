<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 10:00 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Models\AccessModifier;

use Modules\Infrastructure\EloquentRepository;

use Models\AccessModifier\AccessModifierRepositoryInterface;

class AccessModifierRepository extends EloquentRepository implements AccessModifierRepositoryInterface
{
    public function  Model()
    {
        return __NAMESPACE__ . '\AccessModifier';
    }

    public function  getAccessModifiersByLanguageId($language_id)
    {
        return $this->model->where(array('p_language_id' => $language_id, 'active' => 1))->lists('name', 'key');
    }
}
