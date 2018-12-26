<?php

namespace Ylem\Models;

use Illuminate\Database\Eloquent\Model;

class TimePeriod extends Model
{
    protected $fillable = [
        'start',
    ];

    public function org() {
        return $this->belongsTo(Organization::class);
    }
}
