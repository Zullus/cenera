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

Route::get('/persons', ['as' => 'persons.index', 'uses' => 'Persons@index']);

Route::get('/types', ['as' => 'types.index', 'uses' => 'Types@index']);

Route::get('/courts', ['as' => 'courts.index', 'uses' => 'Courts@index']);

Route::get('/lawsuits', ['as' => 'lawsuits.index', 'uses' => 'Lawsuits@index']);

Route::auth();

Route::get('/home', 'HomeController@index');
