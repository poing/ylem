<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
	/**
	 * Show the admin dashboard SPA
	 * @return \Illuminate\Http\Response
	 */
    public function index() {
    	return view('ylem::admin.index');
    }

	/**
	 * Get branch name and versions
	 * @return Illuminate\Http\JsonResponse
	 */
	public function getBranchAndVersionInformation() {
		$repo = new \Cz\Git\GitRepository(base_path());
		$git_version = $repo->getCurrentBranchName();
		$ylem = new \Cz\Git\GitRepository(base_path('poing/ylem'));
		$ylem_version = $ylem->getCurrentBranchName();
		$laravel_version = app()->version();

		$payload = [
			"laravel_version" => "Laravel Version: $laravel_version",
			"ylem_version" => "ylem-base: $git_version",
			"submodule" =>	"poing/ylem: " . strtok(\PackageVersions\Versions::getVersion('poing/ylem'),'@') . " @ $ylem_version"
		];
		
		return new JsonResponse( $payload );
	}
}
