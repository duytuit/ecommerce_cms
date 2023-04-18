<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App;
use Session;
use Config;

class Language
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
        // Middleware 1
        App\Utility\dBug::trackingPhpErrorV2(Carbon::now().'begin');
        if(Session::has('locale')){
            $locale = Session::get('locale');
        }
        else{
            $locale = env('DEFAULT_LANGUAGE','en');
        }

        App::setLocale($locale);
        $request->session()->put('locale', $locale);

        return $next($request);
    }
}
