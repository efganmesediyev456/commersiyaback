<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;

class Language
{

    public function __construct(Redirector $redirector)
    {
        $this->redirector = $redirector ;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $locale  = $request->route()->getPrefix();

        $segments = $request->segments();


        $segments[0] = Cache::get('defaultLang', config('app.fallback_locale')) ;

        if($locale == '') return  $this->redirector->to(implode('/', $segments));


        if(!array_key_exists($locale, config('app.locales'))){

            return abort('404');

        }

        app()->setLocale($locale);
       // $this->cacheUserLang($segments[0]);


        return $next($request);
    }


    /**
     * Cache language to 7 days
     *
     * @param $userLocale
     */
    public function cacheUserLang($userLocale):void
    {

        if ($userLocale !== app()->getLocale()) Cache::put('defaultLang',app()->getLocale(),60 * 60 * 24 * 7);

    }

}
