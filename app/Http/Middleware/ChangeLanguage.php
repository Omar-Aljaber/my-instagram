<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(auth()->check() && !empty(auth()->user()->lang))
       {
        app()->setLocale(auth()->user()->lang);        
       }elseif(Session::has('locale')){
        App::setLocale(Session::get('locale'));
       }

       return $next($request);
    }
}
