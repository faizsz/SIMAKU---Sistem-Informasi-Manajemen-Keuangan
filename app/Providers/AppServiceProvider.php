<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Intercept internal HTTP requests to avoid serverless timeout loop
        try {
            \Illuminate\Support\Facades\Http::fake([
                '*/api/*' => function (\Illuminate\Http\Client\Request $request) {
                    $originalRequest = app('request');
                    
                    $parsed = parse_url($request->url());
                    $path = $parsed['path'] ?? '/';
                    $query = $parsed['query'] ?? '';
                    
                    $internalRequest = \Illuminate\Http\Request::create($path . ($query ? '?' . $query : ''), $request->method(), $request->data());
                    foreach ($request->headers() as $key => $values) {
                        $internalRequest->headers->set($key, $values[0]);
                    }
                    $internalRequest->headers->set('Accept', 'application/json');

                    $response = app()->handle($internalRequest);

                    // Restore original request
                    app()->instance('request', $originalRequest);

                    return \Illuminate\Support\Facades\Http::response(
                        $response->getContent(),
                        $response->getStatusCode(),
                        $response->headers->all()
                    );
                }
            ]);
        } catch (\Exception $e) {
            // Ignore if ApiHelper fails during early boot
        }
    }
}
