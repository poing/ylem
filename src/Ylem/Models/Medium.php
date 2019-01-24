<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;
use Poing\Ylem\Models\ContactMedium as ContactMedium;

class Medium extends Model
{
    protected $table = 'medium';

    public function contactMedium()
    {
        return $this->belongsTo(ContactMedium::class);
    }

}
