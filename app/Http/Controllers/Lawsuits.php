<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Courts as Courts;

use App\Http\Controllers\ClientController as Clients;

use Illuminate\Support\Facades\DB;

class lawsuits extends Controller
{

    protected $Courts;
    protected $Clients;

    function __construct(Courts $Courts, Clients $Clients){

        $this->Courts  = $Courts;
        $this->Clients = $Clients;
    }

    public function index(){
    	$lawsuits = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->paginate(env('PAGINATION_ITEMS', 20));

        $busca = '';

		return view('lawsuits.index')->with(compact('lawsuits', 'busca'));

    }

    public function show($id){

        $more_courts = NULL;

    	$lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->find($id);

        if(!is_null($lawsuit['more_courts'])){

            $more_courts = $this->Courts->more_courts($lawsuit['more_courts']);
        }

        if(!is_null($lawsuit['more_clients'])){

            $more_clients = $this->Clients->more_clients($lawsuit['more_clients']);
        }

        if(!is_null($lawsuit['more_opponents'])){

            $more_opponents = $this->Clients->more_clients($lawsuit['more_opponents']);
        }

    	return view('lawsuits.show')->with(compact('lawsuit', 'more_courts', 'more_clients', 'more_opponents'));
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
	    //$lawsuit->fill($input);

        $lawsuit->type           = $input['types'];
        $lawsuit->process_number = $input['process_number'];
        $lawsuit->client         = $input['client'];
        $lawsuit->opponent       = $input['opponent'];
        $lawsuit->responsable    = $input['responsable'];
        $lawsuit->court          = $input['court'];
        $lawsuit->process        = $input['process'];
        $lawsuit->offense        = $input['offense'];
        $lawsuit->attorney       = $input['attorney'];
	    $lawsuit->save();

	    return redirect()->back()->with('success', 'Actualización de pleito con éxito!');
    }

    public function store(Request $request){

    	$input = $request->all();

    	$lawsuit = new \App\Lawsuit;
	    //$lawsuit->fill($request);
        $lawsuit->type           = $input['types'];
        $lawsuit->process_number = $input['process_number'];
        $lawsuit->client         = $input['client'];
        $lawsuit->opponent       = $input['opponent'];
        $lawsuit->responsable    = $input['responsable'];
        $lawsuit->court          = $input['court'];
        $lawsuit->process        = $input['process'];
        $lawsuit->offense        = $input['offense'];
        $lawsuit->attorney       = $input['attorney'];
	    $lawsuit->save();

    	return view('lawsuits.show')->with(compact('lawsuit'));
    }

    public function create(){

    	$lawsuit = [];

        $alltypes = [];

        $allclients = [];

        $allcourts = [];

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

    	return view('lawsuits.new')->with(compact('lawsuit', 'alltypes', 'selectedLawsuit', 'allclients', 'allcourts'));
    }

    public function search(Request $request){

        $input = $request->all();

        $busca = $input['search'];

        $total = DB::table('vw_lawsuits')
            ->select('id')
            ->where("name", 'like', "%$busca%")
            ->orWhere("lastname", 'like', "%$busca%")
            ->orwhere("opponentname", 'like', "%$busca%")
            ->orWhere("opponentlastname", 'like', "%$busca%")
            ->orwhere("responsablename", 'like', "%$busca%")
            ->orWhere("responsablelastname", 'like', "%$busca%")
            ->orwhere("attorneyname", 'like', "%$busca%")
            ->orWhere("attorneylastname", 'like', "%$busca%")
            ->orWhere("courtname", 'like', "%$busca%")
            ->orWhere("offense", 'like', "%$busca%")
            ->orWhere("process", 'like', "%$busca%")
            ->orWhere("process_number", 'like', "%$busca%")
            ->count();

        if($total > 0){

            $saida = DB::table('vw_lawsuits')
                ->select('id', 'process_number', 'process', 'offense', 'name', 'lastname', 'typename', 'courtname', 'opponentname', 'opponentlastname', 'responsablename', 'responsablelastname', 'attorneyname', 'attorneylastname')
                ->where("name", 'like', "%$busca%")
                ->orWhere("lastname", 'like', "%$busca%")
                ->orwhere("opponentname", 'like', "%$busca%")
                ->orWhere("opponentlastname", 'like', "%$busca%")
                ->orwhere("responsablename", 'like', "%$busca%")
                ->orWhere("responsablelastname", 'like', "%$busca%")
                ->orwhere("attorneyname", 'like', "%$busca%")
                ->orWhere("attorneylastname", 'like', "%$busca%")
                ->orWhere("courtname", 'like', "%$busca%")
                ->orWhere("offense", 'like', "%$busca%")
                ->orWhere("process", 'like', "%$busca%")
                ->orWhere("process_number", 'like', "%$busca%")
                ->get();

            if($total == 1){

                $lawsuit = $saida[0];

                return view('lawsuits.show')->with(compact('lawsuit'));

            }

            $lawsuits = DB::table('vw_lawsuits')
                ->select('id', 'client', 'opponent', 'responsable', 'court', 'attorney', 'process_number', 'process', 'offense', 'name', 'lastname', 'typename', 'courtname', 'opponentname', 'opponentlastname', 'responsablename', 'responsablelastname', 'attorneyname', 'attorneylastname')
                ->where("name", 'like', "%$busca%")
                ->orWhere("lastname", 'like', "%$busca%")
                ->orwhere("opponentname", 'like', "%$busca%")
                ->orWhere("opponentlastname", 'like', "%$busca%")
                ->orwhere("responsablename", 'like', "%$busca%")
                ->orWhere("responsablelastname", 'like', "%$busca%")
                ->orwhere("attorneyname", 'like', "%$busca%")
                ->orWhere("attorneylastname", 'like', "%$busca%")
                ->orWhere("courtname", 'like', "%$busca%")
                ->orWhere("offense", 'like', "%$busca%")
                ->orWhere("process", 'like', "%$busca%")
                ->orWhere("process_number", 'like', "%$busca%")
                ->paginate(env('PAGINATION_ITEMS', 20));

            return view('lawsuits.index')->with(compact('lawsuits', 'busca'));

        }

        return redirect()->back()->with('error', 'La búsqueda no produjo resultados');

    }

    public function destroy ($id){

        $lawsuit = \App\Lawsuit::find($id);

        $result = $lawsuit->delete();

        if(!$result){
            return redirect()->back()->withInput()->withErrors(['Falha ao apagar o pleito']);
        }

        return redirect()->route('lawsuits.index')->with('success', 'Pleito eliminado con éxito!');//O nome aqui é escolha

        }


}
