<?php

namespace  Models\Tool;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tools';

    protected $fillable = ['name','name_url','features','description'];

    protected $guarded = ['id'];


}
