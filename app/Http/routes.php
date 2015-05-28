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

Route::get('/', 'IndexController@index');

//Route::get('/', 'WelcomeController@index');

Route::get('home', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('thought/{id}', array('as' => 'thought', 'uses' => 'ThoughtController@index'));

Route::post('thought/new', array('as' => 'new_thought', 'uses' => 'ThoughtController@postNew'))->before('csrf');

Route::get('temperature/new', array('as' => 'new_temperature', 'uses' => 'TemperatureController@getNew'));

Route::post('temperature/new', array('as' => 'new', 'uses' => 'TemperatureController@postNew'));


Route::get('hello', array('as' => 'hello', 'uses' => function()
{
	return "<h1>HELLO</h1>";
}));

Route::get('about', 'AboutController@index');

Route::get('test', function()
{

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
