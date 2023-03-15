<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 */
	protected function redirectTo($request): ?string
	{
		if ($request->expectsJson()){
			return null;
		}else{
			$request->session()->put('urlPrevious', URL::previous());
			return route('login');
		}
	}
}
