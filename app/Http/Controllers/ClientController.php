<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
{
    public function index(Request $request){

        $url = ['page' => '', 'ordenacao' => '?order=inclusion'];

        $input = $request->all();

        $page = 1;

        if(isset($input['order'])){

            $order = $input['order'];

            $url['ordenacao'] = '?order=inclusion';

            if(isset($input['page'])){

                $page = $input['page'];

            }

            if($page != null){

                $url['ordenacao'] .='&page=' . $page;

                $url['page'] = '?page=' . $page;

            }

            $clients = \App\Client::with('types')
                ->paginate(env('PAGINATION_ITEMS', 20));
        }
        else{

            $clients = \App\Client::with('types')
                ->orderBy('name')
            ->paginate(env('PAGINATION_ITEMS', 20));
        }

		return view('clients.index')->with(compact('clients', 'url'));

    }

    public function show($id){

    	$client = $this->find($id);

        $sucesso = '';

    	return view('clients.show')->with(compact('client', 'sucesso'));
    }

    public function find($id){

        $client = \App\Client::with('types')->find($id);

        return $client;
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
	    //$client->fill($input);
        $client->type     = $input['type'];
        $client->name     = $input['name'];
        $client->lastname = $input['lastname'];
        $client->contact  = $input['contact'];
        $client->adrress  = $input['adrress'];
        $client->phone    = $input['phone'];
        $client->email    = $input['email'];
        $client->mobile   = $input['mobile'];
        $client->fax      = $input['fax'];
        $client->document = $input['document'];
	    $client->save();

	    return redirect()->back()->with('success', 'Actualización del cliente con éxito!');
    }

    public function store(Request $request){

    	$input = $request->all();

    	$client = new \App\Client;
	    //$client->fill($request);
        $client->type     = $input['types'];
        $client->name     = $input['name'];
        $client->lastname = $input['lastname'];
        $client->contact  = $input['contact'];
        $client->adrress  = $input['adrress'];
        $client->phone    = $input['phone'];
        $client->email    = $input['email'];
        $client->mobile   = $input['mobile'];
        $client->fax      = $input['fax'];
        $client->document = $input['document'];
	    $client->save();

        $sucesso = 'Persona añadida exitosamente';

    	return view('clients.show')->with(compact('client', 'sucesso'));
    }

    public function create(){

    	$lawsuit = [];

        $types = \App\Type::orderBy('type')->get();

        foreach ($types as $value) {
            $alltypes[$value->id] = $value->type;
        }

    	return view('clients.new')->with(compact('client', 'alltypes'));
    }

    public function destroy ($id){

        $client = \App\Client::find($id);

        $result = $client->delete();

        if(!$result){
            return redirect()->back()->withInput()->withErrors(['Falha ao apagar a persona']);
        }

        return redirect()->route('clients.index')->with('success', '<strong>Hecho!</strong>Persona eliminada con éxito!');//O nome aqui é escolha

    }

    public function more_clients($arr){

        if(!is_null($arr)){

            $arr = explode(',', $arr);

            $s = array();

            foreach ($arr as &$value) {

                $client = $this->find($value);

                array_push($s, $client['name'] . ' ' . $client['lastname']);

            }

            return $s;
        }

        return NULL;
    }
}
