<?php


use Poing\Ylem\Resources\OrganizationResource;
use Poing\Ylem\Models\Organization;
//use Illuminate\Support\Facades\Route;

Route::prefix('partyManagement')->group(function() {
	Route::prefix('individual')->group(function() {
		Route::get('/{id}', 'IndividualController@show');
	});
	Route::prefix('organization')->group(function() {
		Route::post('/', 'OrgController@storeRoot');
		Route::get('/{id}', 'OrgController@show');
	});
});

Route::prefix('admin')->group(function() {
	Route::get('manager/root', 'ManagerController@root');
	Route::get('manager/children/{id}', 'ManagerController@children');
	Route::prefix('email')->group(function() {
		Route::post('store', 'EmailController@store');
		Route::post('preferred', 'EmailController@preferred');
	});
});

Route::get('/tree', 'TreeController@treeData');
