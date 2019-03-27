<?php
use Poing\Ylem\Models\Organization;
use Poing\Ylem\Models\PartyRelationship;
use Poing\Ylem\Resources\OrganizationResource;
use Poing\Ylem\Resources\PartyOrgResource;
use Poing\Ylem\Http\Controllers\AdminController;


Route::get('/oc', function () {
    //return OrganizationResource::collection(Organization::where('type', 'Company')->get());
    return PartyRelationship::find(1)->descendants()->with('party')->get();
});

Route::get('/or/{num?}', function ($num = 1) {
    return PartyOrgResource::collection(PartyRelationship::find(1)->descendants()->where('party_type', 'App\\Organization')->get());
    //return PartyRelationship::with('party')->find(1);
});

/* Route::any('/stub', 'StubController@stub'); */

// Create route
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/{any}', 'AdminController@index')->name('admin.*');
