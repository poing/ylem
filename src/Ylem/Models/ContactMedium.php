<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMedium extends Model
{
    protected $table = 'contact_medium';

    public function party() {
        return $this->morphTo();
    }

    public function medium() {
        return $this->hasOne('Poing\Ylem\Models\Medium', 'medium_id');
    }

}
