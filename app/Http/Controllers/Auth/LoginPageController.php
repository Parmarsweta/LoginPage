<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPageController extends Controller
{
    public function loginPage(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,doctor,staff',
        ]);

        $guard = $request->role;

        if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
            return redirect()->route($guard . '.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
