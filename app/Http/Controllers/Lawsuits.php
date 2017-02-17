<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class lawsuits extends Controller
{
    public function index(){
    	$lawsuits = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->paginate(env('PAGINATION_ITEMS', 20));

		return view('lawsuits.index')->with(compact('lawsuits'));

    }

    public function show($id){

    	$lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->find($id);

    	return view('lawsuits.show')->with(compact('lawsuit'));
    }
}
