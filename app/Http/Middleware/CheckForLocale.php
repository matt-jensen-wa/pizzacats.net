<?php

namespace App\Http\Middleware;

use Closure;
use App;

class CheckForLocale
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
        $locale = 'en';
        if($request->has('locale')){
            $locale = $request->input('locale', 'en');
            session(['locale' => $locale ]);
        }
        App::setLocale($locale);
        return $next($request);
    }
}
