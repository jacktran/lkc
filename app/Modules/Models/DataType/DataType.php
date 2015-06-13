<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 5/11/15
 * Time: 9:14 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Models\DataType;

use Illuminate\Database\Eloquent\Model;


class DataType extends Model
{
    protected $table = 'data_types';

    public function  dataTypeKey()
    {
        return $this->belongsTo('Models\DataType\DataType', 'key_id');
    }
}