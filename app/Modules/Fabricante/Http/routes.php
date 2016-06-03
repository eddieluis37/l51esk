<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'fabricante'], function() {
	Route::get('/', function() {
		dd('This is the Fabricante module index page.');
	});
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'fabricante', 'middleware' => ['web']], function () {
	//
});



// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {

    // Fabricante routes
    Route::group(['prefix' => 'fabricante'], function () {

        Route::get('methodName',           ['as' => 'fabricante.method_name',         'uses' => 'FabricanteController@methodName']);
        Route::get('create',               ['as' => 'fabricante.create',              'uses' => 'FabricanteController@create']);
        Route::post('store',               ['as' => 'fabricante.store',               'uses' => 'FabricanteController@store']);
        Route::delete('destroy',           ['as' => 'fabricante.destroy',             'uses' => 'FabricanteController@destroy']);

        Route::get('methodName',        ['as' => 'fabricante.method_name',         'uses' => 'FabricanteController@methodName']);
        Route::get('create',            ['as' => 'fabricante.new',                 'uses' => 'FabricanteController@create']);
        Route::post('store',            ['as' => 'fabricante.store',               'uses' => 'FabricanteController@store']);

    }); // End of Fabricante group


}); // end of AUTHORIZE middleware group
