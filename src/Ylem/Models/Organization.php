<?php

namespace Ylem\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    protected $fillable = [
        'group_id', 'existsDuring', 'tradingName', 'nameType',
    ];

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function period() {
        return $this->hasOne(TimePeriod::class);
    }

}
