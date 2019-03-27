<?php

namespace Poing\Ylem\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
	 * Show the admin dashboard SPA
	 * @return \Illuminate\Http\Response
	 */
    public function index() {
    	return view('admin.index');
    }
}
