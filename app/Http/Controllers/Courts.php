<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class courts extends Controller
{

	public function index(){

		$courts = \App\Court::paginate(env('PAGINATION_ITEMS', 20));

    	return view('courts.index')->with(compact('courts'));
	}

    public function show($id){

    	$court = $this->find($id);

    	return view('courts.show')->with(compact('court'));
    }

    public function find($id){

    	$court = \App\Court::find($id);

    	return $court;
    }

    public function more_courts($arr){

    	if(!is_null($arr)){

    		$arr = explode(',', $arr);

	    	$s = array();

	    	foreach ($arr as &$value) {

	    		$court = $this->find($value);

	    		array_push($s, $court['court']);

			}

			return $s;
		}

		return NULL;
    }
}
