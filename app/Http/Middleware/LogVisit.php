<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $ip = $request->ip();
        $user_agent = $request->header('User-Agent');
        $key = 'visit_'. md5($ip . $user_agent);
        if(!Cache::has($key)){
            $response = Http::get("http://ip-api.com/json/{$ip}");
            $country = $response->json('country');
            \App\Models\Visit::create([
               'ip_address'=>$ip,
               'user_agent'=>$user_agent,
               'country'=>$country,
            ]);
            Cache::put($key,true,now()->addMinutes(60));
        }


        return $next($request);
    }
}
