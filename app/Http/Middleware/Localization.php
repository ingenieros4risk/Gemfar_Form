<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if ($request->has('language')) {
            \App::setLocale($request->language);
        } else {
            \App::setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
