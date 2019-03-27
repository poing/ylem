<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Individual as Individual;
use App\Organization as Organization;
use App\PartyRelationship as PartyRelationship;
use Illuminate\Http\Request;

class StubController extends Controller
{
    public function stub()
    {
        $data = PartyRelationship::roots()->get();
        return view('ylem.tree', compact('data'));
    }
}
