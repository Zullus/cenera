<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class persons extends Controller
{
    public function index(){

		$persons = \App\Persons::paginate(env('PAGINATION_ITEMS', 20));

		return view('persons.index')->with(compact('persons'));

    }
}
