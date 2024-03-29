<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Models\admin\Statistic;

class TrackStatistics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->url();

        if (str_contains($url, '/admin') || str_contains($url, '/getBanner') || str_contains($url, '/getContact') || str_contains($url, '/getAbout') || str_contains($url, '/getOurFeature') || str_contains($url, '/getService') || str_contains($url, '/getFreeQoute') || str_contains($url, '/getTestimonial') || str_contains($url, '/getBlog') || str_contains($url, '/getClient') || str_contains($url, '/getTeam') || str_contains($url, '/count') || str_contains($url, '/fetchData') || str_contains($url, '/comment') || str_contains($url, '/serverside') ) {
            return $next($request);
        } else {
            $statistics = new Statistic();
            $statistics->ip_address = $request->ip();
            $statistics->url = str_replace(route('web.index'), '', $url);

            $agent = new Agent();
            $statistics->device = $agent->device();
            $statistics->platform = $agent->platform();
            $statistics->browser = $agent->browser();
            $statistics->visit_time = now();
            $statistics->save();
        }

        return $next($request);
    }
}
