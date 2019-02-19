<?php

namespace Poing\Ylem\Http\Controllers;

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
}
