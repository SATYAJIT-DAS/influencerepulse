<?php

namespace App\Http\Middleware;

use Closure;

class Seller
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
        if((auth()->user()->role->name === 'seller') || (auth()->user()->role->name === 'admin'))
            return $next($request);

        // Redirect to login route with a flash message
        return redirect()->back()->with('error', 'Access denied. Login to continue.');
    }
}
