<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class courts extends Controller
{

	public function index(){

		$courts = \App\Courts::paginate(env('PAGINATION_ITEMS', 20));

    	return view('courts.index')->with(compact('courts'));
	}
}
