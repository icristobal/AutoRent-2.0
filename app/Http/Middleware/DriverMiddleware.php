<?php 
namespace App\Http\Middleware;

use Closure;
use Auth;

class DriverMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Auth::user()->usertype;
		if ($user == 2)
		{
			return $next($request);
		}
		else{
			return back();
		}
		return redirect()->route('driver-home');
	}

}