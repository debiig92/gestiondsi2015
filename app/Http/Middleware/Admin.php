<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
class Admin {
    function __construct(Guard $auth)
    {
        $this->auth=$auth;
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

        if($this->auth->user()->idtu ==1){
           return redirect()->to('homeD');
        }

      return $next($request);
	}

}
