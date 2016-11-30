<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class lawsuits extends Controller
{
    public function index(){

    	$lawsuits = \App\Lawsuits::paginate(env('PAGINATION_ITEMS', 20));

		return view('lawsuits.index')->with(compact('lawsuits'));

    }
}
