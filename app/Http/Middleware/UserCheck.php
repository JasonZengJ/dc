<?php namespace diancan\Http\Middleware;

use Closure;

class UserCheck {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if (!$request->getSession()->get('user')) {
			return redirect()->guest('auth/login');
		}

		return $next($request);
	}

}
