<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Helpers\ApiHelper;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class BeasiswaController extends Controller
{
    public function index()
    {
        $userData = Session::get('user_data');
        $token = Session::get('token');

        // Jika tidak ada user data
        if (!$userData) {
            return redirect()->route('login')->withErrors(['error' => 'Harap login terlebih dahulu.']);
        }

        $nim = Session::get('username'); // atau $userData['nim']
        $beasiswa = $this->getApiData("/api/penerima-beasiswa?nim=" . urlencode($nim), $token);
        //dd($beasiswa);
        return view('mahasiswa.beasiswa.beasiswa', compact('beasiswa', 'userData'));
    }

    private function getApiData($endpoint, $token)
    {
        try {
            $response = Http::withToken($token)->get(ApiHelper::baseUrl() . $endpoint);
            return $response->successful() ? optional($response->json())['data'] ?? [] : [];
        } catch (\Exception $e) {
            return [];
        }
    }
}
