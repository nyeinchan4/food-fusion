<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    /* ===================== REGISTER ===================== */

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'     => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'is_verified'=> false,
        ]);

        return redirect()->route('login.form')
            ->with('success', 'Registration successful. Please log in.');
    }

    /* ===================== LOGIN ===================== */

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // If user exists, check lock status
        if ($user && $user->locked_until && Carbon::now()->lessThan($user->locked_until)) {
            return back()->withErrors([
                'error' => 'Account locked. Try again later.',
            ]);
        }

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'))) {

            // Reset failed attempts on success
            $user->update([
                'failed_login_attempts' => 0,
                'locked_until' => null,
            ]);

            $request->session()->regenerate();

            return redirect('/')->with('success', 'Logged in successfully.');
        }

        // Login failed
        if ($user) {
            $attempts = $user->failed_login_attempts + 1;

            $data = ['failed_login_attempts' => $attempts];

            if ($attempts >= 3) {
                $data['locked_until'] = Carbon::now()->addMinutes(3);
                $data['failed_login_attempts'] = 0;
            }

            $user->update($data);
        }

        return back()->withErrors([
            'error' => 'Invalid credentials.',
        ]);
    }

    /* ===================== LOGOUT ===================== */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
