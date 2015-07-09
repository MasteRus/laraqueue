<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	| 	lara_onlinerecord_organizations
	*/

	public function index()
	{
                //$QueueOrganizations = QueueOrganizations::get();
                //return View::make('index')->with('QueueOrganizations', $QueueOrganizations);
		//return View::make('hello');
                return View::make('index');
	}

        public function index2()
	{
                //$QueueOrganizations = QueueOrganizations::get();
                //return View::make('index')->with('QueueOrganizations', $QueueOrganizations);
		//return View::make('hello');
                return View::make('phpinfo');
	}
    public function getAdmin()
    {
        //return link_to(route('auth.logout'), 'Выход');
        return View::make('index');
    }
    
    public function test()
    {
        //return link_to(route('auth.logout'), 'Выход');
        return View::make('test');
    }

}
