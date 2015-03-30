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

Route::group(array('before' => 'guest'), function () 
{
    Route::get('login', array(
        'as' => 'auth.login', 
        'uses' => 'AuthController@getLogin'
    ));

    Route::post('login', array(
        'before' => 'csrf',
        'uses' => 'AuthController@postLogin'
    ));
});

Route::group(array('before' => 'auth'), function ()
{
    Route::get('admin', array(
        'as' => 'admin',
        'uses' => 'HomeController@getAdmin',
    ));

    Route::get('logout', array(
        'as' => 'auth.logout',
        'uses' => 'AuthController@getLogout'
    ));
    Route::resource('s_q_orgs', 'S_q_orgsController');
    Route::resource('s_q_depts', 'S_q_deptsController');
    
    Route::get('createaccount', array(
        'as' => 'auth.createaccount', 
        'uses' => 'AuthController@getcreateaccount'
    ));
    
    Route::post('createaccount', array(
        'before' => 'csrf',
        'uses' => 'AuthController@postcreateaccount'
    ));

    Route::get('accounts', array(
        'as' => 'getaccounts', 
        'uses' => 'AuthController@getaccounts'
    ));
    
    Route::get('accounts/{userid}', array(
        'as' => 'auth.edit', 
        'uses' => 'AuthController@GetSelectedAccount'
    ));
    
    Route::post('accounts/{userid}', array(
        'before' => 'csrf',
        'uses' => 'AuthController@PostEditAccount'
    ));
    Route::patch('accounts/{userid}', array(
        'before' => 'csrf',
        'uses' => 'AuthController@PostEditAccount'
    ));
    //

    Route::resource('groups', 'GroupsController');

    Route::get('accounts/delete/{userid}', array(
        'as' => 'auth.delete',
        'uses' => 'AuthController@DeleteAccount'
    ));
}); 

   