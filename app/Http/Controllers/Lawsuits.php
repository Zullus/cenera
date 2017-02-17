<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class lawsuits extends Controller
{
    public function index(){
    	$lawsuits = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'older_courts'])->paginate(env('PAGINATION_ITEMS', 20));
    	//$lawsuits = \App\Lawsuit::with('clients')->find(1);

    	//$clients= $lawsuits->clients;

    	//dd($clients);

    	//dd($lawsuits->clients->name);

//dd($lawsuits);
		return view('lawsuits.index')->with(compact('lawsuits'));

    }
}
