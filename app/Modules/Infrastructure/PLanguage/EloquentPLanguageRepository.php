<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/10/15
 * Time: 5:17 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Modules\Infrastructure\PLanguage;

use Models\PLanguage\PLanguageRepositoryInterface as PLanguageRepositoryInterface;
use Modules\Infrastructure\EloquentRepository as EloquentRepository;

class EloquentPLanguageRepository extends  EloquentRepository implements PLanguageRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return   "Models\PLanguage\PLanguage";
    }

    public function  getPLanguageByName($name)
    {
        // TODO: Implement getPLanguageByName() method.
    }
}
