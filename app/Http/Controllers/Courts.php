<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class courts extends Controller
{

	public function index(){

		$courts = \App\Court::paginate(env('PAGINATION_ITEMS', 20));

    	return view('courts.index')->with(compact('courts'));
	}

    public function show($id){

    	$court = \App\Court::find($id);

    	return view('courts.show')->with(compact('court'));
    }
}
