<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Resources\TreeItem;
use App\PartyRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TreeController extends Controller
{
	/**
	 * Show the tree
	 * @return \Illuminate\Http\Response
	 */
    public function index() {
    	return view('tree');
    }

    /**
     * Return Tree Data
     * @return \Illuminate\Http\JsonResponse
     */
    public function treeData() {
    	$treeData = $this->buildTree();
    	return new JsonResponse($treeData);
    }

    /**
     * Build the tree output for json
     * @return array
     */
    protected function buildTree() {
    	$data = [];
    	$roots = PartyRelationship::roots()->get();
    	foreach ($roots as $root) {
    		if (count($root->getImmediateDescendants())) {
    			array_push($data, $this->treeItem($root));
			} else {
    			array_push($data, $this->treeItem($root));
    		}
    	}
    	return $data;
    }

    /**
     * Get childs
     * @return array
     */
    protected function burrow($childs) {
    	$arr = [];
    	foreach ($childs as $child) {
    		if ($child->getImmediateDescendants()) {
    			if (str_contains($child->party_type, 'Organization')) {
    				array_push($arr, $this->treeItem($child));
    			} else {
    				array_push($arr, $this->treeItem($child));
    			}
    		} else {
    			if (str_contains($child->party_type, 'Organization'))
    				array_push($arr, $this->treeItem($child));
    			else
    				array_push($arr, $this->treeItem($child));
    		}
    	}
    	return $arr;
    }

    /**
     * Create tree item
     * @param  \App\Http\Controllers\PartyRelationship $item
     * @return array
     */
    protected function treeItem($item) {
    	return [
    		// 'id' => $item->id,
    		'text' => str_contains($item->party_type, 'Organization') ? $item->party->tradingName : $item->party->fullName,
    		// 'type' => $item->party_type,
    		// 'source' => $item,
    		'icon' => str_contains($item->party_type, 'Organization') ? 'fa fa-users' : 'fa fa-user',
    		'opened' => true,
    		'children' => $this->burrow($item->getImmediateDescendants())
    	];
    }
}
