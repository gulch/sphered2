<?php

namespace App\Http\Middleware;

use Closure;
use gulch\GMinify;

class MinifyMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if(config('app.env') === 'production') {
            $response->setContent(GMinify::minifyHTML($response->getContent()));
        }

        return $response;
    }
}
