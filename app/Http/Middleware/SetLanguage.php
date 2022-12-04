<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
{
	public function handle(Request $request, Closure $next)
	{
		if (Session()->has('applocale') and array_key_exists(Session()->get('applocale'), config('languages')))
		{
			App::setLocale($locale = Session()->get('applocale'));
		}

		Session()->put('applocale', $locale ?? config('app.locale'));
		App::setLocale(config('app.locale'));
		return $next($request);
	}
}
