<?php 
namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware {

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
		if ($user == 1)
		{
			return $next($request);
		}
		else{
			return back();
		}
		return redirect()->route('user-home');
	}

}