<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!\Auth::check())
        {
            return redirect()->route('index');
        }

        if(!boolval(\Auth::user()->admin))
        {
            return redirect()->back()->withErrors(["Unauthorized action: U heeft geen admin rechten", "Als u denkt dat dit een misverstand is, neem dan snel contact op \nmet de beheerder van de website"]);
        }



        return $next($request);
    }
}
