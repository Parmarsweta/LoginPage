<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    /**
     * Show the customer login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    /**
     * Handle the customer login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to log the customer in using the "customer" guard
        if (Auth::guard('customer')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Redirect to customer dashboard or intended route
            return redirect()->intended(route('customer.dashboard'))->with('success', 'Login successful!');
        }

        // Return with an error message if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the customer out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return redirect('/customer/login')->with('success', 'Logged out successfully.');
    }
}
