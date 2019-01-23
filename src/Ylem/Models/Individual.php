<?php

namespace Poing\Ylem\Models;

//use App\Organization;
//use App\PartyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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


}
