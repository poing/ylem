<?php

use Illuminate\Http\Request;
use Poing\Ylem\Models\Individual as Individual;
use Poing\Ylem\Models\Organization as Organization;
use Poing\Ylem\Resources\IndividualResource as IndividualResource;
use Poing\Ylem\Resources\OrganizationResource as OrganizationResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/organization/{num}', function ($num) {
    return new OrganizationResource(
        Organization::find($num)
    );
});

Route::get('/organization', function () {
    return OrganizationResource::collection(
        Organization::where('type', 'Company')
        ->get()
    );
});

Route::get('/individual/{num}', function ($num) {
    return new IndividualResource(
        Individual::find($num)
    );
});

Route::get('/individual', function () {
    return IndividualResource::collection(
        Individual::all()
    );
});
