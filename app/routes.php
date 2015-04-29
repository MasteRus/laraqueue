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
/*********************************************
 * Authentification
 *********************************************/
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
/*********************************************
 * Main admin page
 *********************************************/

    Route::get('admin', array(
        'as' => 'admin',
        'uses' => 'HomeController@getAdmin',
    ));

    Route::get('logout', array(
        'as' => 'auth.logout',
        'uses' => 'AuthController@getLogout'
    ));
    

    //- See more at: http://laravelsnippets.com/snippets/sentry-route-filters#sthash.NsmoUvVW.dpuf    
    
    //Route::group(array('before' => 'Sentry|hasAccess:superuser'), function()
    //{

    //});   
    /*********************************************
     * Only for admins
     *********************************************/
    Route::group(array('before' => 'adminfilter2'), function()
    {
        Route::resource('s_q_orgs', 'S_q_orgsController');
        Route::resource('s_q_depts', 'S_q_deptsController');
        Route::resource('s_q_services', 'S_q_servicesController');
        
        Route::get('treeindex', array(
            'as' => 'S_q_services.treeindex', 
            'uses' => 'S_q_servicesController@treeindex'
        ));
        Route::get('buildTree', array(
            'as' => 'buildTree', 
            'uses' => 'S_q_servicesController@buildTree'
        ));
        //Route::get('foo/bar', 'FooController@bar');
        
        Route::resource('groups', 'GroupsController');
        
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
        Route::get('accounts/delete/{userid}', array(
            'as' => 'auth.delete',
            'uses' => 'AuthController@DeleteAccount'
        ));
    });   
}); 
