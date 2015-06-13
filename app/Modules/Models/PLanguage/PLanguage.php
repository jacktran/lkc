<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/9/15
 * Time: 9:30 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Models\PLanguage;

use Illuminate\Database\Eloquent\Model;

class PLanguage extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'p_languages';

    protected  $fillable = array('name','name_pattern','structure','root_name','active');

    protected $guarded = ['id'];
}
