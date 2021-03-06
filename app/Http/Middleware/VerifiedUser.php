<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifiedUser
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
        
        if($user->verified != 1){
            return redirect()->route('user.askVerification');
        }

        return $next($request);
    }
}
