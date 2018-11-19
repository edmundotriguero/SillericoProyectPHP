<?php

namespace sillericos\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Closure;

class IsAdmin
{
    
    protected $auth;

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
        if ($this->auth->user()->type != 'admin') {
            $this->auth->logout();
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
               //return redirect()->to('login');
               return redirect()->to('login');
            }
        }

        return $next($request);
    }
}
