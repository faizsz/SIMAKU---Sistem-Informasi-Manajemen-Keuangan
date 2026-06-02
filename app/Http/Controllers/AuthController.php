<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // If already logged in, redirect based on role
        if (Session::has('token') && Session::has('logged_in')) {
            $role = Session::get('role');

            if ($role === 'mahasiswa') {
                return redirect()->route('lihat-tagihan-ukt');
            } elseif ($role === 'admin') {
                return redirect()->route('admin.kelola-pengguna');
            } elseif ($role === 'staff') {
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
            // Cari user langsung dari database (tidak pakai self HTTP call)
            $user = User::where('username', $request->username)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                Log::warning('Login gagal: credentials salah', ['username' => $request->username]);
                return back()->withErrors(['username' => 'Login gagal! Cek kembali username dan password.']);
            }

            if (! $user->is_active) {
                Log::warning('Login gagal: akun tidak aktif', ['username' => $request->username]);
                return back()->withErrors(['username' => 'Akun Anda tidak aktif. Silakan hubungi administrator.']);
            }

            // Update last login
            $user->update(['last_login' => Carbon::now()]);

            // Buat Sanctum token
            $token = $user->createToken('auth_token')->plainTextToken;

            // Simpan ke session
            Session::put('token', $token);
            Session::put('token_type', 'Bearer');
            Session::put('username', $user->username);
            Session::put('logged_in', true);
            Session::put('role', $user->role);
            Session::put('email', $user->email ?? '');
            Session::put('user_data', [
                'id'       => $user->id,
                'username' => $user->username,
                'email'    => $user->email,
                'role'     => $user->role,
            ]);

            Log::info('Login berhasil', ['username' => $user->username, 'role' => $user->role]);

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.kelola-pengguna');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('lihat-tagihan-ukt');
            } elseif ($user->role === 'staff') {
                return redirect()->route('staff.pembayaran-ukt');
            }

            // Fallback jika role tidak dikenali
            Log::warning('Role tidak dikenali setelah login', ['role' => $user->role]);
            return back()->withErrors(['username' => 'Peran pengguna tidak dikenali. Hubungi administrator.']);

        } catch (\Exception $e) {
            Log::error('Exception during login', [
                'error'    => $e->getMessage(),
                'username' => $request->username,
            ]);
            return back()->withErrors(['username' => 'Terjadi kesalahan sistem: ' . $e->getMessage()]);
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

        // Hapus Sanctum token dari database jika ada
        if ($token) {
            try {
                // Cari dan hapus token dari database
                $user = \App\Models\User::where('username', $username)->first();
                if ($user) {
                    $user->tokens()->where('name', 'auth_token')->delete();
                }
            } catch (\Exception $e) {
                Log::warning('Gagal hapus token saat logout', [
                    'error'    => $e->getMessage(),
                    'username' => $username
                ]);
            }
        }

        // Hapus session
        Session::flush();

        Log::info('Logout completed', ['username' => $username]);

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}