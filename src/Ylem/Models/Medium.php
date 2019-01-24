<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $table = 'medium';

    public function contactMedium()
    {
        return $this->belongsTo('Poing\Ylem\Models\ContactMedium');
    }

}
