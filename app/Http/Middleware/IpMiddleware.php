<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Redirect;

class IpMiddleware
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
         $ip = $request->ip();  
         $myIP =  explode('.', $ip);
        // $blocked = $myIP[0]+ '.' + $myIP[1] + '.' + $myIP[2];
        $array = array($myIP[0].$myIP[1].$myIP[2]);
        $class= implode(".", $array);
        //dd($class);

        if ($class == '2028114'  ||$ip == '103.102.234.241' || $ip == '112.79.62.141') {
        // here instead of checking a single ip address we can do collection of ips
        //address in constant file and check with in_array function
           $url = '/';
			    return Redirect::to($url);
        }

        return $next($request);
    }
}
