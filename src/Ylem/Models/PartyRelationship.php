<?php

namespace Poing\Ylem\Models;

//use App\Individual;
//use App\Organization;
use Baum\Node;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartyRelationship extends Node
{

    // Soft deletes not recommended with Baum
    use SoftDeletes;
	protected $with = ['party', 'children'];
    protected $dates = ['deleted_at'];

    public function party() {
        return $this->morphTo();
    }

    function delete()
    {
        // May not be desired, using soft delete for party
        //$this->party()->existsDuring()->delete();
        //$org = $this->party();
        //$org->existsDuring()->delete();
        $this->party()->delete();
        parent::delete();
    }

}