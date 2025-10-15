<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class TrackTraffic
{
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();

        \Log::info('Visit logged', [
            'ip' => $request->ip(),
            'device' => $agent->device(),
            'platform' => $agent->platform(),
            'browser' => $agent->browser(),
            'url' => $request->fullUrl(),
        ]);

        return $next($request);
    }
}
