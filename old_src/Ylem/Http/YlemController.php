<?php
// This is just for testing Facades
namespace Poing\Ylem\Http;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class YlemController extends BaseController
{
    public static function test()
    {

        return true;
    }
}
