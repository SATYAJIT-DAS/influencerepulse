<?php

namespace App\Http\Middleware;

use Closure;

class MailVerify
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
        if (auth()->user()->mail_verify === 1)
            return $next($request);

        // Redirect to login route with a flash message redirect()->back()->with('message', $msg);

        return redirect()->route('dashboard')->with(['status' => 'Please do email verify']);
    }
}
