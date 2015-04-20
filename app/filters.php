<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
    if (!Sentry::check()) return Redirect::guest(route('auth.login'));
});
Route::filter('auth.basic', function()
{
    return Auth::basic();
});
/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/
Route::filter('guest', function()
{
    if (Sentry::check()) return Redirect::to('/');
});

Route::filter('Sentry', function()
{
    if (! Sentry::check()) {
        return Redirect::route('admin');
    }
});

/**
* hasAcces filter (permissions)
*
* Check if the user has permission (group/user)
*/
Route::filter('hasAccess', function($route, $request, $value)
{
    try
    {
    $user = Sentry::getUser();

    if( ! $user->hasAccess($value))
        {
        return Redirect::route('admin');
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        return Redirect::route('admin');
    }
});

/**
* InGroup filter
*
* Check if the user belongs to a group
*/
Route::filter('inGroup', function($route, $request, $value)
{
    try
    {
        $user = Sentry::getUser();
        $group = Sentry::findGroupByName($value);
            if( ! $user->inGroup($group))
            {
                return Redirect::route('admin');
            }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        //return Redirect::route('admin')->withErrors(array(Lang::get('user.notfound')));
        return Redirect::route('admin');
    }
    catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
    {
        return Redirect::route('admin');
    }
});

/////////////////////////////////////////////////

Route::filter('adminfilter', function()
{
  $user = Sentry::getUser();
  $admin = Sentry::findGroupByName('superusergroup');
  if (!$user->inGroup($admin)) return Redirect::to('admin')->with('message', 'Access Denied' );
});

///////////////////////////////////////
// Filter on current access by group //
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! //
// ! It's a main variant             //
///////////////////////////////////////
Route::filter('adminfilter2', function()
{
  $user = Sentry::getUser();
  $admin = Sentry::findGroupByName('superusergroup');
  
  //dd( $user->inGroup($admin));
  if (!$user->hasAccess('superusergroup')) return Redirect::to('admin')->with('message', 'Access Denied' );
});

//
//
/////////////////////////////////////////////////



/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
