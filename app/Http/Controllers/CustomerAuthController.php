<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    // Registration
    public function showRegisterForm()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:custom_users',
            'password' => 'required|min:6|confirmed',
        ]);

        CustomUser::create([
            'email' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
