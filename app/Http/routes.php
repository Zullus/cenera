<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Lawsuits@index');

/**
* Clients/Persons
*/
Route::group(['prefix' => 'persons'], function(){

	Route::get('/', ['as' => 'clients.index', 'uses' => 'ClientController@index']);
	Route::get('new', ['as' => 'clients.create', 'uses' => 'ClientController@create']);
	Route::get('{id}', ['as' => 'clients.show', 'uses' => 'ClientController@show']);
	Route::post('store', ['as' => 'clients.store', 'uses' => 'ClientController@store']);
	Route::get('{id}/edit', ['as' => 'clients.edit', 'uses' => 'ClientController@edit']);
	Route::post('{id}/update', ['as' => 'clients.update', 'uses' => 'ClientController@update']);
	Route::get('{id}/delete', ['as' => 'clients.destroy', 'uses' => 'ClientController@destroy']);

});

/**
* Types
*/
Route::group(['prefix' => 'types'], function(){

	Route::get('/', ['as' => 'types.index', 'uses' => 'Types@index']);
	Route::get('{id}', ['as' => 'types.show', 'uses' => 'Types@show']);
	Route::post('store', ['as' => 'types.store', 'uses' => 'Types@store']);
	Route::get('{id}/edit', ['as' => 'types.edit', 'uses' => 'Types@edit']);
	Route::post('{id}/update', ['as' => 'types.update', 'uses' => 'Types@update']);
	Route::get('{id}/delete', ['as' => 'types.destroy', 'uses' => 'Types@destroy']);

});

/**
* Courts
*/
Route::group(['prefix' => 'courts'], function(){

	Route::get('/', ['as' => 'courts.index', 'uses' => 'Courts@index']);
	Route::get('new', ['as' => 'courts.create', 'uses' => 'Courts@create']);
	Route::get('{id}', ['as' => 'courts.show', 'uses' => 'Courts@show']);
	Route::post('store', ['as' => 'courts.store', 'uses' => 'Courts@store']);
	Route::get('{id}/edit', ['as' => 'courts.edit', 'uses' => 'Courts@edit']);
	Route::post('{id}/update', ['as' => 'courts.update', 'uses' => 'Courts@update']);
	Route::get('{id}/delete', ['as' => 'courts.destroy', 'uses' => 'Courts@destroy']);

});

/**
* Lawsuits
*/
Route::group(['prefix' => 'lawsuits'], function(){

	Route::get('/', ['as' => 'lawsuits.index', 'uses' => 'Lawsuits@index']);
	Route::get('new', ['as' => 'lawsuits.create', 'uses' => 'Lawsuits@create']);
	Route::post('search', ['as' => 'lawsuits.search', 'uses' => 'Lawsuits@search']);
	Route::get('search', ['as' => 'lawsuits.search', 'uses' => 'Lawsuits@search']);
	Route::get('{id}', ['as' => 'lawsuits.show', 'uses' => 'Lawsuits@show']);
	Route::post('store', ['as' => 'lawsuits.store', 'uses' => 'Lawsuits@store']);
	Route::get('{id}/edit', ['as' => 'lawsuits.edit', 'uses' => 'Lawsuits@edit']);
	Route::post('{id}/update', ['as' => 'lawsuits.update', 'uses' => 'Lawsuits@update']);
	Route::get('{id}/delete', ['as' => 'lawsuits.destroy', 'uses' => 'Lawsuits@destroy']);
	Route::get('{id}/{client}/{param}/client', ['as' => 'lawsuits.remove_client', 'uses' => 'Lawsuits@remove_client']);
	Route::get('{id}/{court}/court', ['as' => 'lawsuits.remove_court', 'uses' => 'Lawsuits@remove_court']);
	Route::get('{id}/{process}/process', ['as' => 'lawsuits.remove_process', 'uses' => 'Lawsuits@remove_process']);

});

Route::auth();

Route::get('/home', 'HomeController@index');
