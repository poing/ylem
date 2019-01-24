<?php
// Old and should be removed!
namespace Poing\Ylem\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ylem\Models\Group;
use Ylem\Models\Stub;
use Ylem\Models\User;

class StubController extends Controller
{
    public function stub()
    {
        $data = Stub::roots()->get();
        return view('ylem.tree', compact('data'));
        //return view('tree', \App\Stub::roots()->get());
    }
}
