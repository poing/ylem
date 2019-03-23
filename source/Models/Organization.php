<?php

namespace Poing\Ylem\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Poing\Ylem\Models\Characteristic as Characteristic;
use Poing\Ylem\Models\ContactMedium as ContactMedium;
use Poing\Ylem\Models\PartyRelationship as PartyRelationship;
use Poing\Ylem\Models\TimePeriod as TimePeriod;

class Organization extends Model
{
    use SoftDeletes;
	protected $with = ['contactMedium'];
    protected $dates = ['deleted_at'];

    public static $snakeAttributes = false;

    protected $fillable = [
        'time_period_id', 'existsDuring', 'tradingName', 'nameType',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];


    protected $appends = [
        'href',
    ];

    protected $casts = [
        'isLegalEntity' => 'boolean',
    ];

    public function getHrefAttribute()
    {
        return \URL::to(
            '/partyManagement/organization',
            $this->attributes['id']
        );
    }

    public function getisLegalEntityAttribute()
    {
        return boolval($this->attributes['isLegalEntity']);
    }


    public function party()
    {
        return $this->morphOne(PartyRelationship::class, 'party');
    }

    public function existsDuring() {
        return $this->morphOne(TimePeriod::class, 'period');

    }

    public function trait() {
        return $this->morphMany(Characteristic::class, 'trait');

    }

    public function contactMedium() {
        return $this->morphMany(ContactMedium::class, 'contact');
    }

    // this is a recommended way to declare event handlers
 /*   public static function boot() {
        parent::boot();

        static::deleted(function($org) { // after delete() method call this
             $org->existsDuring()->delete();
             // do the rest of the cleanup...
        });
    }
*/

    /**
     * Used to test phpunit access to this class
     */
    public static function probe()
    {
        return true;
    }
}
