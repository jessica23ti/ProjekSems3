<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showRegris()
    {
        return view('login');
    }
    public function showLoginAdmin()
    {
        return view('Admin.loginAdmin');
    }
    public function verifyEmail(EmailVerificationRequest  $request)
    {
        $request->fulfill();
        #setelah di verifikasi di mau kemana:
        //  return redirect()->(route());
    }

    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
    public function LogicLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->Role === 'Admin') {
                return redirect('/AdminPage'); // Rute khusus admin
            } elseif ($user->Role === 'User') {
                return redirect('/pemesanan'); // Rute khusus user biasa
            }
        }
        return back()->withErrors([
            'email1' => 'Email atau password salah.',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function LogicRegrister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'no_hp' => 'required|numeric|digits_between:10,15|unique:users',
            'Role' => 'nullable|string',
            'email_verified_at' => 'nullable|string',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'alamat' => $validated['alamat'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),  // Hash password
            'Role' => $validated['Role'] ?? 'User',
            'no_hp' => $validated['no_hp'],
            'point_reward' => null,
            'email_verified_at' => null,  // Email belum diverifikasi
        ]);

        // Login pengguna baru
        Auth::login($user);

        // Trigger event pendaftaran
        event(new Registered($user));

        // Flash pesan sukses
        session()->flash('success', 'Akun berhasil dibuat! Silakan login.');

        // Redirect ke halaman registrasi atau dashboard
        return redirect('/pemesanan');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
