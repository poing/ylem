<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Poing\Ylem\Models\Organization;
use Poing\Ylem\Models\PartyRelationship;


class OrgController extends Controller
{
    static function new_parent()
    {
        $tmp = [ 'tradingName' => uniqid(), ];
        $party = PartyRelationship::create(['type' => 'organization']);
        $party->makeRoot();

        $tmp['party_relationship_id'] = $party->id;

        Organization::create($tmp);


    }

    /**
     * Show create view
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('organization.create');
    }

    /**
     * Store a root organization from the form
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeRoot(Request $request) {
    	// Create the Organization record
        $org = new Organization();
        $org->isLegalEntity = true; // hidden
        $org->type = 'Company'; // hidden
        $org->tradingName = $request->tradingName;
        $org->nameType = $request->nameType;
        $org->status = $request->status;
        $org->save();

    	// Add the startDate (YYYY-MM-DD)
    	$org->existsDuring()->create([
    	    'startDate' => Carbon::parse($request->startDate),
    	]);

    	// Make it a root node in PartyRelationship
    	$parent = $org->party()->create();

    	return new JsonResponse($org);
    }
}
