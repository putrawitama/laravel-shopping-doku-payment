<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HasIdentity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        
        if($user->fullname == null){
            return redirect()->route('user.setbio');
        }
        return $next($request);
    }
}
