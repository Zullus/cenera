<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
{
    public function index(){

		$clients = \App\Client::with('types')->paginate(env('PAGINATION_ITEMS', 20));

		return view('clients.index')->with(compact('clients'));

    }}
