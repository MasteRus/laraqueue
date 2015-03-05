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
/*
Route::put('/orgs/save/{org_id}', [
        'as'    => 'edit-org',
        'uses'  => 'orgController@editOrg'
]);

*/
Route::put('/orgs/save/{org_id}', [
        'as'    => 'edit-org',
        'uses'  => 'orgController@editOrg'
]);

/*
Route::bind('Org', function($value, $route){
    return Org::where('id', $value)->first();
});
*/
Route::get('/orgs/delete/{org_id}', [
        'as' => 'delete-org', 
        'uses' => 'OrgController@deleteOrg'
]);


Route::resource('s_q_orgs', 'S_q_orgsController');

Route::resource('s_q_depts', 'S_q_deptsController');