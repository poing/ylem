<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;
use Poing\Ylem\Models\Medium as Medium;

class ContactMedium extends Model
{

    protected $fillable = [
        'preferred', 'type',
    ];

    protected $table = 'contact_medium';

    public function party() {
        return $this->morphTo();
    }

    public function medium() {
        return $this->hasOne(Medium::class, 'medium_id');
    }

    /**
     * Used to test phpunit access to this class
     */
    public static function test()
    {
        return true;
    }
}
