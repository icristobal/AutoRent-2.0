<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {

            $auth = Auth::user()->usertype;
            
            switch ($auth) {
                case '1':
                        return  redirect()->route('user-home');    
                    break;
                case '2':
                        return  redirect()->route('driver-home'); 
                    break;
                case '3':
                        return  redirect()->route('admin-home');  
                    break;

                default:
                    return  redirect()->route('welcome');  
                    break;
            }   

         }

        return $next($request);
    }
}