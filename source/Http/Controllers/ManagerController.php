<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Poing\Ylem\Models\PartyRelationship;

class ManagerController extends Controller
{
	/**
	 * Get the roots for all!
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function root() {
		$rootItems = PartyRelationship::roots()->with('children')->get();
		return new JsonResponse($rootItems);
	}

	/**
	 * Get the children of the root
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function children($id) {
		$children = PartyRelationship::find($id)->getImmediateDescendants();
		return new JsonResponse($children);
	}

	/**
	* Get the siblings
	* @return \Illuminate\Http\JsonResponse
	 */
	public function sibling($id) {
		$siblings = PartyRelationship::find($id)->siblings();
		return new JsonResponse($siblings);
	}

	/**
	 * Get the parent
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function parent($id) {
		$parent = PartyRelationship::find($id)->parent();
		return new JsonResponse($parent);
	}
}
