<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class types extends Controller
{
    public function index(){

    	$types = \App\Types::all();

    	return view('types.index')->with(compact('types'));

    }
}
