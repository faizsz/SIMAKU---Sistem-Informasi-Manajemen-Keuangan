<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

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

        $kernel = app(\Illuminate\Contracts\Http\Kernel::class);
        $response = $kernel->handle($internalRequest);

        app()->instance('request', $originalRequest);

        return \Illuminate\Support\Facades\Http::response(
            $response->getContent(),
            $response->getStatusCode(),
            $response->headers->all()
        );
    }
]);

$user = \App\Models\User::first();
echo "User role: " . $user->role . "\n";
$token = $user->createToken('test')->plainTextToken;

$response = \Illuminate\Support\Facades\Http::withToken($token)->get('https://simaku.vercel.app/api/fakultas');

echo "Status: " . $response->status() . "\n";
echo "Body: " . $response->body() . "\n";
