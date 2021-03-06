<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuth
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
        $AUTH_USER = 'admin';
        $AUTH_PASS = 'admin';

        header('Cache-controll :no-cache ,must revalidate ,max-age=0');

        $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER'])) && empty($_SERVER['PHP_AUTH_PW']);

        $is_not_authenticated = (!&has_supplied_credentials || &_SERVER['PHP_AUTH_USER'] != &AUTH_USER || &_SERVER['PHP_AUTH_PW'] != &AUTH_PASS);

        IF(&is_not_authenticated){
            header('HTTP/1.1 401 Authorization Required');
            header('WWW-Authenticate : Basic realm = "Access Denied"');
            exit;
        }
        return $next($request);
    }
}
