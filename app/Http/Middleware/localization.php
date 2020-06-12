<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;


class localization
{
    public function handle($request, Closure $next)
    {
        if(Session::has('locale'))
        {
            App::setlocale(Session::get('locale'));
        }
        else
        {
            $local = ($request->hasHeader('localization')) ? $request->header('localization') : 'en';
            app()->setLocale($local);
        }
        return $next($request);
    }
}
