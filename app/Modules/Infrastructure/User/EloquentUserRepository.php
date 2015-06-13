<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/4/15
 * Time: 12:02 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Modules\Infrastructure\User;

use Models\User\UserRepositoryInterface as UserRepositoryInterface;
use Modules\Infrastructure\EloquentRepository as EloquentRepository;

class EloquentUserRepository  extends  EloquentRepository implements UserRepositoryInterface{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return   "Models\User\User";
    }


}
