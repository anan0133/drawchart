<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $raw_locale = Session::get('locale');

        if (!empty($raw_locale) and in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        } else
            $locale = Config::get('app.locale');

        App::setLocale($locale);

        return $next($request);
    }
}