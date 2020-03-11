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
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

use App\models\request\ErrorTokenResponseRequestModel;

//Validate that the request has a token to continue
Route::filter('token', function($route, $request)
{		

	$json = $request->json()->all();
	$valid = true;
	if(!array_key_exists("token", $json)){
		$valid = false;
	}
	else{
		$token = $json["token"];
		if($token!=Config::get('app_globals.token')){
			$valid = false;
		}
	}		
	if(!$valid){		
		return json_encode(new ErrorTokenResponseRequestModel());
	}
});

//Validate that the request has a token to continue
Route::filter('session', function($route, $request)
{		

	if(!Session::has('user')){
		return Redirect::to('/login');
	}
});

//Validate that the request has a token to continue in get method
Route::filter('tokeng', function($route, $request)
{		

	$token = $request->input("token");
	$valid = true;
	if($token==NULL){
		$valid = false;
	}
	else{		
		if($token!=Config::get('app_globals.token')){
			$valid = false;
		}
	}		
	if(!$valid){		
		return json_encode(new ErrorTokenResponseRequestModel());
	}
});

//Valida que el request traiga body
Route::filter('containsBody', function($route, $request)
{		
	$postbody='';
	// Check for presence of a body in the request
	if (!count($request->json()->all())) {
	    return "error";
	}	
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
	if (Auth::check()) return Redirect::to('/');
});

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
