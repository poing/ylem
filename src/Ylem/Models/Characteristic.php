<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{

    //protected $primaryKey = 'name';
    //public $incrementing = false;
    //protected $keyType = 'string';

    protected $fillable = [
        'name', 'value',
    ];

    protected $hidden = [
        'id', 'trait_id', 'trait_type', 'created_at', 'updated_at',
    ];


    public function party() {
        return $this->morphTo();
    }

}
