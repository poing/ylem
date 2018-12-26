<?php

namespace Ylem\Http;

use Ylem\Models\Group;
use Ylem\Models\User;
use Ylem\Models\Stub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StubController extends Controller
{
    public function stub()
    {
        $data = Stub::roots()->get();
        return view('ylem.tree', compact('data'));
        //return view('tree', \App\Stub::roots()->get());
    }
}
