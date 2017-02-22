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

    public function update(Request $request){

    	$input = $request->all();

    	$lawsuit = \App\Lawsuit::find($input['id']);
	    $lawsuit->fill($input);
	    $lawsuit->save();

	    return redirect()->back()->with('success', 'Lawsuit update with success!');
    }

    public function store(Request $request){

    	$input = $request->all();

    	$lawsuit = new \App\Lawsuit;
	    $lawsuit->fill($request);
	    $lawsuit->save();

    	return view('lawsuits.edit')->with(compact('lawsuit'));
    }

    public function create(){

    	$lawsuit= [];

    	return view('lawsuits.new')->with(compact('lawsuit'));
    }

    public function search(Request $request){

        $input = $request->all();

        $lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])
                ->where('process_number', $input['search'])
                ->paginate(env('PAGINATION_ITEMS', 20));
dd($lawsuit);
        return view('lawsuits.show')->with(compact('lawsuit'));
    }


}
