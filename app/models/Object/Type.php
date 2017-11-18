<?php

namespace App\Model\Object;

class Type extends Model
{
	protected $table = 'object_types';

    protected $fillable = [
        'name',
        'slug',
        'template',
    ];

    public function statuses()
    {
        return $this->hasMany('App\Model\Object\Status');
    }

}
