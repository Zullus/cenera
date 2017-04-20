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

    public function find($id){

        $lawsuit = \App\Lawsuit::with(['clients', 'opponents', 'responsables', 'types', 'courts', 'attorneys'])->find($id);

        return $lawsuit;
    }

    public function show($id){

        $more_courts = NULL;

    	$lawsuit = $this->find($id);

        if(!is_null($lawsuit['more_courts'])){

            $more_courts = $this->Courts->more_courts($lawsuit['more_courts']);
        }

        if(!is_null($lawsuit['more_clients'])){

            $more_clients = $this->Clients->more_clients($lawsuit['more_clients']);
        }

        if(!is_null($lawsuit['more_opponents'])){

            $more_opponents = $this->Clients->more_clients($lawsuit['more_opponents']);
        }

        $more_process = explode(',' , $lawsuit['more_process']);

    	return view('lawsuits.show')->with(compact('lawsuit', 'more_courts', 'more_clients', 'more_opponents', 'more_process'));
    }

    public function edit($id){

    	$alltypes = [];

    	$allclients = [];

    	$allcourts = [];

    	$lawsuit = $this->find($id);

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

        if(!is_null($lawsuit['more_courts'])){

            $more_courts = $this->Courts->more_courts($lawsuit['more_courts']);
        }

        if(!is_null($lawsuit['more_clients'])){

            $more_clients = $this->Clients->more_clients($lawsuit['more_clients']);
        }

        if(!is_null($lawsuit['more_opponents'])){

            $more_opponents = $this->Clients->more_clients($lawsuit['more_opponents']);
        }

        $more_process = explode(',' , $lawsuit['more_process']);

		$selectedLawsuit = $id;

    	return view('lawsuits.edit')->with(compact('lawsuit', 'alltypes', 'selectedLawsuit', 'allclients', 'allcourts', 'more_courts', 'more_clients', 'more_opponents', 'more_process'));
    }

    public function update(Request $request){

    	$input = $request->all();

    	//$lawsuit = \App\Lawsuit::find($input['id']);
        $lawsuit = $this->simplefind($input['id']);
	    //$lawsuit->fill($input);

        $lawsuit->type           = $input['types'];
        $lawsuit->process_number = $input['process_number'];

        //$lawsuit->client         = $input['client'];
        if($input['client'] != '' && $input['client'] != NULL && $input['client'] > 3){

            if(is_null($lawsuit->client)){
                $lawsuit->client = $input['client'];
            }
            else{

                $lawsuit->more_clients .= ',' . $input['client'];
            }

        }

        //$lawsuit->opponent       = $input['opponent'];
        if($input['opponent'] != '' && $input['opponent'] != NULL && $input['opponent'] > 3){

            if(is_null($lawsuit->opponent)){
                $lawsuit->opponent = $input['opponent'];
            }
            else{

                $lawsuit->more_opponents .= ',' . $input['opponent'];
            }

        }

        $lawsuit->responsable    = $input['responsable'];

        //$lawsuit->court          = $input['court'];
        if($input['court'] != '' && $input['court'] != NULL && $input['court'] > 3){

            if(is_null($lawsuit->court)){
                $lawsuit->court = $input['court'];
            }
            else{

                $lawsuit->more_courts .= ',' . $input['court'];
            }

        }

        //$lawsuit->process        = $input['process'];

        if($input['process'] != '' && $input['process'] != NULL){

            if(is_null($lawsuit->process)){
                $lawsuit->process = $input['process'];
            }
            else{

                $lawsuit->more_process .= ',' . $input['process'];
            }

        }

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

        $more_courts = NULL;

        if(!is_null($lawsuit['more_courts'])){

            $more_courts = $this->Courts->more_courts($lawsuit['more_courts']);
        }

        if(!is_null($lawsuit['more_clients'])){

            $more_clients = $this->Clients->more_clients($lawsuit['more_clients']);
        }

        if(!is_null($lawsuit['more_opponents'])){

            $more_opponents = $this->Clients->more_clients($lawsuit['more_opponents']);
        }

        $more_process = explode(',' , $lawsuit['more_process']);

    	return view('lawsuits.show')->with(compact('lawsuit', 'more_courts', 'more_clients', 'more_opponents', 'more_process'));
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

    public function remove_client ($id, $client, $param){

        $lawsuit = $this->simplefind($id);

        if($client == 0){

            $lawsuit->$param = NULL;

            $lawsuit->save();

            if($param == 'client'){

                return redirect()->back()->with('success', 'Client elimina!');

            }

            return redirect()->back()->with('success', 'Adversario elimina!');

        }

        $more_clients = $lawsuit['more_' . $param . 's'];

        $more_clients = explode(',', $more_clients);

        $mc = '';

        unset($more_clients[$client - 1]);

        foreach ($more_clients as $c) {

            $mc .= $c;

            if($c != end($more_clients)){

                $mc .= ',';

            }
        }

        $s = 'more_' . $param . 's';

        $lawsuit->$s = $mc;

        $lawsuit->save();

        if($param == 'client'){

            return redirect()->back()->with('success', 'Client elimina!');

        }

        return redirect()->back()->with('success', 'Adversario elimina!');

    }

    public function remove_court ($id, $court){

        $lawsuit = $this->simplefind($id);

        if($court == 0){

            $lawsuit->court = NULL;

            $lawsuit->save();

            return redirect()->back()->with('success', 'Corte elimina!');

        }

        $more_courts = $lawsuit['more_courts'];

        $more_courts = explode(',', $more_courts);

        $mc = '';

        unset($more_courts[$court - 1]);

        foreach ($more_courts as $c) {

            $mc .= $c;

            if($c != end($more_courts)){

                $mc .= ',';

            }
        }

        $lawsuit->more_courts = $mc;

        $lawsuit->save();

        return redirect()->back()->with('success', 'Corte elimina!');

    }

    public function remove_process($id, $process){

        $lawsuit = $this->simplefind($id);

        if($process == 0){

            $lawsuit->process = NULL;

            $lawsuit->save();

            return redirect()->back()->with('success', 'Expediente elimino!');

        }

        $more_process = $lawsuit['more_process'];

        $more_process = explode(',', $more_process);

        $mp = '';

        unset($more_process[$process - 1]);

        foreach ($more_process as $c) {

            $mp .= $c;

            if($c != end($more_process)){

                $mp .= ',';

            }
        }

        $lawsuit->more_process = $mp;

        $lawsuit->save();

        return redirect()->back()->with('success', 'Expediente elimino!');

    }

    public function simplefind($id){

        $lawsuit = \App\Lawsuit::find($id);

        return $lawsuit;
    }
}
