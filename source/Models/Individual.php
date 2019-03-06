<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Poing\Ylem\Models\Characteristic as Characteristic;
use Poing\Ylem\Models\ContactMedium as ContactMedium;
use Poing\Ylem\Models\PartyRelationship as PartyRelationship;

class Individual extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'href', 'name',
    ];

    /*
     * temporary for backwards compatability to Org dev work.
     */
    public function getnameAttribute()
    {
        return $this->attributes['fullName'];
    }

    public function getHrefAttribute()
    {
        return \URL::to(
            '/partyManagement/individual',
            $this->attributes['id']
        );
    }

    public function party()
    {
        return $this->morphOne(PartyRelationship::class, 'party');
    }

    public function trait() {
        return $this->morphMany(Characteristic::class, 'trait');
    }

    public function contactMedium() {
        return $this->morphMany(ContactMedium::class, 'contact');
    }

    /**
     * Used to test phpunit access to this class
     */
    public static function probe()
    {
        return true;
    }
}
