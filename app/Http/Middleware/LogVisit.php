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
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,'https://ipgeolocation.abstractapi.com/v1/?api_key='. env('APP_VISIT_API_KEY') .'&ip_address=175.176.77.191');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $data = json_decode($response);

            $visited = new \App\Models\Visit;
            $visited->ip_address = $ip;
            $visited->user_agent = $user_agent;
            $visited->country = $data->country;
            $visited->region = $data->region;
            $visited->postal_code = $data->postal_code;
            $visited->city = $data->city;
            $visited->save();

            session()->put('Country',$data->country);
            session()->put('Region',$data->region);
            session()->put('Postal Code',$data->postal_code);
            session()->put('City',$data->city);
            session()->put('Latitude',$data->latitude);
            session()->put('Longitude',$data->longitude);

            Cache::put($key,true,now()->addMinutes(60));
        }


        return $next($request);
    }
}
