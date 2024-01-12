<?php

		namespace App\Http\Middleware;

		use Closure;
		use Illuminate\Auth\AuthenticationException;
		use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

		class ApiKeyMiddleware
		{
			/**
			 * Handle an incoming request.
			 *
			 * @param  \Illuminate\Http\Request  $request
			 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
			 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
			 */
			public function handle(Request $request, Closure $next)
			{
				if (config('app.api_key') != $request->header('api-key') ) {
					return response(['status' => false, 'message' => 'Invalid API Key']);
				}

				app()->setLocale(request()->header('language'));
				return $next($request);
			}
		}