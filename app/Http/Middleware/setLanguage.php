<?php

namespace App\Http\Middleware;

use Closure;

class setLanguage
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
        if (in_array($request->locale, config('app.locales')))
        {
            session()->put('locale' , $request->locale);

            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
