<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
{
    public function index(){

		$clients = \App\Client::with('types')->paginate(env('PAGINATION_ITEMS', 20));

		return view('clients.index')->with(compact('clients'));

    }

    public function show($id){

    	$client = \App\Client::with('types')->find($id);

    	return view('clients.show')->with(compact('client'));
    }

    public function edit($id){

    	$alltypes = [];

    	$client = \App\Client::with('types')->find($id);

    	$types = \App\Type::all();

    	foreach ($types as $value) {
			$alltypes[$value->id] = $value->type;
		}

		$selectedClient = $id;

    	return view('clients.edit')->with(compact('client', 'alltypes', 'selectedClient'));
    }

    public function update(Request $request){

    	$input = $request->all();

    	$client = \App\Client::find($input['id']);
	    $client->fill($input);
	    $client->save();

	    return redirect()->back()->with('success', 'Lawsuit update with success!');
    }

    public function store(Request $request){

    	$input = $request->all();

    	$client = new \App\Client;
	    $client->fill($request);
	    $client->save();

    	return view('clients.edit')->with(compact('client'));
    }

    public function create(){

    	$lawsuit = [];

        $types = \App\Type::all();

        foreach ($types as $value) {
            $alltypes[$value->id] = $value->type;
        }

    	return view('clients.new')->with(compact('client', 'alltypes'));
    }

}
