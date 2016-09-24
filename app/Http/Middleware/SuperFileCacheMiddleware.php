<?php

namespace App\Http\Middleware;

use Closure;

class SuperFileCacheMiddleware
{
    public function handle($request, Closure $next)
    {
        if (config('app.env') === 'production') {
            $cached_filename = storage_path('framework/cache') . '/' . $this->getSlug();
            if (file_exists($cached_filename)) {
                echo file_get_contents($cached_filename);
                exit();
            }
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (config('app.env') === 'production') {
            $cached_filename = storage_path('framework/cache') . '/' . $this->getSlug();
            file_put_contents($cached_filename, $response->getContent());
        }
    }

    private function getSlug()
    {
        $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower(trim($_SERVER['REQUEST_URI'], '/ ')));
        if (!$slug) {
            $slug = 'index';
        }

        return $slug;
    }
}
