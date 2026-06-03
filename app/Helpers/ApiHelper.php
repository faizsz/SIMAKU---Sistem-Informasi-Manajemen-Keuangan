<?php

namespace App\Helpers;

class ApiHelper
{
    /**
     * Kembalikan base URL untuk internal API call.
     * Selalu pakai request URL saat ini agar tidak bergantung pada APP_URL env.
     * Ini penting untuk Vercel di mana domain bisa berbeda-beda per deployment.
     */
    public static function baseUrl(): string
    {
        // Coba dari request aktif dulu (paling akurat)
        if (app()->bound('request') && request()->getHost()) {
            $request = request();
            $scheme = $request->getScheme();
            $host   = $request->getHttpHost(); // host + port

            // Di Vercel, selalu gunakan https
            if (env('APP_ENV') === 'production') {
                $scheme = 'https';
            }

            return rtrim($scheme . '://' . $host, '/');
        }

        // Fallback ke APP_URL dari config
        return rtrim(config('app.url', 'http://localhost'), '/');
    }

    /**
     * Buat HTTP client untuk internal API call.
     * Disable SSL verify karena app memanggil dirinya sendiri.
     */
    public static function httpClient(string $token = null): \Illuminate\Http\Client\PendingRequest
    {
        $client = \Illuminate\Support\Facades\Http::withoutVerifying()
            ->timeout(30);

        if ($token) {
            $client = $client->withToken($token);
        }

        return $client;
    }

    /**
     * Buat URL lengkap ke endpoint API internal.
     */
    public static function url(string $endpoint): string
    {
        return static::baseUrl() . '/' . ltrim($endpoint, '/');
    }
}
