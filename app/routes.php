<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|{{ Form::open(array(
    'url' => 'our/target/route',
    'method' => 'GET',
    'accept-charset' => 'ISO-8859-1'
)) }}
*/

Route::get('/', [
        'as'    => 'index',
        'uses'  => 'HomeController@index'
]);

Route::get('/orgs', [
        'as'    => 'getOrgsList',
        'uses'  => 'orgController@getOrgsList'
]);

Route::get('/orgs/{org_id}', [
        'as'    => 'getOrg',
        'uses'  => 'orgController@getOrg'
]);

Route::get('/orgs/{org_id}/save', [
        'as'    => 'editOrgSave',
        'uses'  => 'orgController@editOrgSave'
]);
/*
Route::get('/todo/new', [
    'as' => 'new-task', 'uses' => 'TodoController@getNew'
]);
 
Route::post('/todo/new', [
    'uses' => 'TodoController@postNew'
])->before('csrf');
 
 */