<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Config;
use Cookie;
use Crypt;
use Illuminate\Support\Facades\Session;

class SetLanguage {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(Cookie::get("lang2") !== NULL) {
            $locale = Crypt::decrypt($request->cookie("lang2"));
        } else {
            $locale = Config::get("app.locale");
        }

        App::setLocale($locale);

        return $next($request);
    }

}
