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

    public function edit($id){

    	$alltypes = [];

    	$allclients = [];

    	$allcourts = [];

    	$lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->find($id);

    	$types = \App\Type::all();

    	foreach ($types as $value) {
			$alltypes[$value->id] = $value->type;
		}

		$clients = \App\Client::all();

		foreach ($clients as $value) {
			$allclients[$value->id] = $value->name;
		}

		$courts = \App\Court::all();

		foreach ($courts as $value) {
			$allcourts[$value->id] = $value->court;
		}

		$selectedLawsuit = $id;

    	return view('lawsuits.edit')->with(compact('lawsuit', 'alltypes', 'selectedLawsuit', 'allclients', 'allcourts'));
    }

    public function update($id){

    	$lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->find($id);

    	return view('lawsuits.edit')->with(compact('lawsuit'));
    }

    public function store($id){

    	$lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->find($id);

    	return view('lawsuits.edit')->with(compact('lawsuit'));
    }


}
