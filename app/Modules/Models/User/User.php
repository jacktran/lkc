<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/4/15
 * Time: 11:18 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Models\User;

use Illuminate\Database\Eloquent\Model as Model;

class User extends  Model
{
    protected $table = 'users';

    protected $fillable = ['name','email','password','remember_token'];

    protected $guarded = ['id'];

}
