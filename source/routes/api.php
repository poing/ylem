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

	Route::prefix('postal')->group(function() {
		Route::post('store', 'PostalController@store');
		Route::post('preferred', 'PostalController@preferred');
	});

	Route::prefix('phone')->group(function() {
		Route::post('store', 'PhoneController@store');
		Route::post('preferred', 'PhoneController@preferred');
	});
});

Route::get('/tree', 'TreeController@treeData');
