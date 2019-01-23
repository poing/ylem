<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimePeriod extends Model
{

    public static $snakeAttributes = false;

    protected $fillable = [
        'startDate', 'endDate',
    ];

    protected $appends = [
  //      'endDate',
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at', 'period_id', 'period_type',
    ];

    /*public function getendDateAttribute($value)
    {
        if (!is_null($value)) {
            return $value;
        } else {
         //return 'blaa';
        }
        //parent::hidden[] = 'endDate';
        //return 'override';
    }*/

    public function period() {
        return $this->morphTo();
    }

}
