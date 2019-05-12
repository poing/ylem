<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Poing\Ylem\Models\ContactMedium;
use Poing\Ylem\Models\Medium;
use Poing\Ylem\Models\PartyRelationship;

class PostalController extends Controller
{
	/**
	 * @param Illuminate\Http\Request
	 * @return Illuminate\Http\JsonResponse
	 */
	public function store(Request $request) {

		// Create a new ContactMedium entry
		$cm = new ContactMedium();
		$cm->contact_type = $request->partyType;
		$cm->contact_id = $request->partyId;
		$cm->type = "postal";
		$cm->save();

		// Create a new medium
		$m = new Medium();
		$m->city = $request->city;
		$m->country = $request->country;
		$m->postcode = $request->postcode;
		$m->stateOrProvince = $request->stateOrProvince;
		$m->street1 = $request->street1;
		$m->street2 = $request->street2;
		$m->medium_id = $cm->id;
		$m->save();

		return new JsonResponse(ContactMedium::with('medium')->find($cm->id));
	}

	/**
	 * @param Illuminate\Http\Request
	 * @return Illuminate\Http\JsonResponse
	 */
	public function preferred(Request $request) {
		$cm = ContactMedium::where('contact_id', $request->partyId)
							   ->where('type', 'postal')
							   ->where('contact_type', $request->partyType)
							   ->get();

		foreach ($cm as $contact) {
			if ($contact->id === $request->preferredId) {
				$contact->preferred = 1;
				$contact->save();
			} else {
				$contact->preferred = 0;
				$contact->save();
			}
		}

		return new JsonResponse(PartyRelationship::find($request->partyRelationshipId));
	}
}

