<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // If already logged in, redirect based on role
        if (Session::has('token') && Session::has('logged_in')) {
            $role = Session::get('role');

            Log::info('User already logged in', [
                'role' => $role,
                'username' => Session::get('username')
            ]);

            if ($role == 'mahasiswa') {
                return redirect()->route('mahasiswa-dashboard');
            } elseif ($role == 'admin') {
                return redirect()->route('admin.kelola-pengguna');
            } elseif ($role == 'staff') {
                return redirect()->route('staff.pembayaran-ukt');
            }
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            // Cek user di database secara langsung
            $user = \App\Models\User::where('username', $request->username)->first();

            if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
                return back()->withErrors(['username' => 'Login gagal! Cek kembali username dan password.']);
            }

            if (!$user->is_active) {
                return back()->withErrors(['username' => 'Akun Anda tidak aktif. Silakan hubungi administrator.']);
            }

            // Update last login
            $user->update(['last_login' => \Carbon\Carbon::now()]);

            // Generate token (opsional, jika API masih dibutuhkan)
            $token = $user->createToken('auth_token')->plainTextToken;

            // Simpan data ke session
            Session::put('token', $token);
            Session::put('token_type', 'Bearer');
            Session::put('username', $user->username);
            Session::put('logged_in', true);
            
            $userData = $user->toArray();
            
            // Pastikan role diset dari user
            $role = strtolower($user->role);
            if ($role === 'administrator' || $user->is_admin == 1) {
                $role = 'admin';
            }
            
            Session::put('user_data', $userData);
            Session::put('role', $role);
            Session::put('email', $user->email ?? '');

            // Login untuk auth session bawaan Laravel
            \Illuminate\Support\Facades\Auth::login($user);

            Log::info('Login successful directly via model', [
                'username' => $user->username,
                'role' => $role
            ]);

            // Redirect berdasarkan role
            if ($role === 'admin') {
                return redirect()->route('admin.kelola-pengguna');
            } elseif ($role === 'mahasiswa') {
                return redirect()->route('lihat-tagihan-ukt');
            } elseif ($role === 'staff') {
                return redirect()->route('staff.pembayaran-ukt');
            }

            // Fallback default
            return redirect()->route('login')
                ->with('error', 'Tidak dapat menentukan peran pengguna. Silakan hubungi administrator.');

        } catch (\Exception $e) {
            Log::error('Exception during login', [
                'error' => $e->getMessage(),
                'username' => $request->username,
                'trace' => $e->getTrace()
            ]);
            return back()->withErrors(['username' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        $token = Session::get('token');
        $username = Session::get('username');

        Log::info('Logout attempt', [
            'username' => $username,
            'has_token' => !empty($token)
        ]);

        if (auth()->check()) {
            $user = auth()->user();
            if ($user) {
                // Hapus token Sanctum yang sedang aktif
                $user->currentAccessToken()?->delete();
            }
            \Illuminate\Support\Facades\Auth::logout();
        }

        // Hapus session
        Session::flush();

        Log::info('Logout completed', [
            'username' => $username
        ]);

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}