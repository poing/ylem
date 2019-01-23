<?php

namespace Poing\Ylem\Http;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YlemController extends Controller
{
    public static function test()
    {
        //$data = Stub::roots()->get();
        //return view('ylem.tree', compact('data'));
        //return view('tree', \App\Stub::roots()->get());
        return true;
    }
}