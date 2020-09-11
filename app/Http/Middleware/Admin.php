<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(auth()->user()->role->name === 'admin')
            return $next($request);

        // Redirect to login route with a flash message redirect()->back()->with('message', $msg);
        return redirect()->back()->with('error','you are not admin.');
    }
}