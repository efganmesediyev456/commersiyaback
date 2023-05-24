<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
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
        $route = $request->route()->getName() ;



        if (auth('admin')->user()->hasRole($route))
        {

            return $next($request);
        }


        return redirect()->route('dashboard')->withErrors(['error' => 'Sorğunu icra etmək üçün səlahiyyətiniz çatmır!']) ;



    }
}
