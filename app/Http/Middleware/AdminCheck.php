<?php namespace diancan\Http\Middleware;

use Closure;

class AdminCheck {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
//		$user = $request->getSession()->get('user');
//		if ($user->user_type != 1) {
//			return response('非法访问！', 401);
//		}
		return $next($request);
	}

}
