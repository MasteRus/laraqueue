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

Route::get('test', [
        'as'    => 'test',
        'uses'  => 'HomeController@test'
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
        Route::resource('s_q_operplaces', 'S_q_operplacesController');
        //Tree builder
        Route::get('treeindex', array(
            'as' => 'S_q_services.treeindex', 
            'uses' => 'S_q_servicesController@treeindex'
        ));
        Route::get('buildTree', array(
            'as' => 'buildTree', 
            'uses' => 'S_q_servicesController@buildTree'
        ));
        
        Route::resource('groups', 'GroupsController');
        //*******************Accounts*******************
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
        
        Route::get('loggedusers', array(
            'as' => 'getloggedusers', 
            'uses' => 'AuthController@getloggedusers'
        ));
    });
    //*******************TERMINAL*******************
        Route::get('terminal/index', array(
            'as' => 'getterminalindex', 
            'uses' => 'S_q_servicesController@getterminalindex'
        ));
        Route::get('terminal/index/{parent_id}', array(
            'as' => 'getterminalindex', 
            'uses' => 'S_q_servicesController@getterminalindex'
        ));
        
        Route::post('terminal/index/{parent_id}', array(
            'as' => 'postterminalindex', 
            'uses' => 'S_q_servicesController@postterminalindex'
        ));
    
    //*********************PULT*********************
        Route::get('pult/index', array(
            'as' => 'getpult', 
            'uses' => 'PultController@index'
        ));
        
        Route::post('pult/FinishServing', array(
            'as' => 'FinishServing', 
            'uses' => 'PultController@FinishServing'
        ));
        Route::post('pult/callNextVisiter', array(
            'as' => 'callNextVisiter', 
            'uses' => 'PultController@callNextVisiter'

        ));
        
        Route::post('pult/StartPause', array(
            'as' => 'StartPause', 
            'uses' => 'PultController@StartPause'
        ));
        Route::post('pult/StopPause', array(
            'as' => 'StopPause', 
            'uses' => 'PultController@StopPause'
        ));
        Route::post('pult/RedirectVisiterTo', array(
            'as' => 'RedirectVisiterTo', 
            'uses' => 'PultController@RedirectVisiterTo'
        ));
        Route::post('pult/GetNextUserBeforeChoosen', array(
            'as' => 'GetNextUserBeforeChoosen', 
            'uses' => 'PultController@GetNextUserBeforeChoosen'
        ));
        
        Route::post('pult/ExitPult', array(
            'as' => 'ExitPult', 
            'uses' => 'PultController@ExitPult'
        ));
        
}); 

//Debug
Route::get('phpinfo', [
        'as'    => 'phpinfo',
        'uses'  => 'HomeController@index2'
]);

