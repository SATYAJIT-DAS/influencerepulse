<?php

namespace App\Http\Middleware;

use Closure;

class PhoneVerify
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
        if(auth()->user()->phone_verify === 1)
            return $next($request);

        // Redirect to login route with a flash message redirect()->back()->with('message', $msg);

        return redirect()->back()->with('error','you are not verify.');
    }
}
