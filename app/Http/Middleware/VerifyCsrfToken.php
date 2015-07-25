<?php namespace diancan\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		try {
			return parent::handle($request, $next);
		} catch(TokenMismatchException $e) {
			return response('下单超时，请重新下单！',500);
		}

	}

}
