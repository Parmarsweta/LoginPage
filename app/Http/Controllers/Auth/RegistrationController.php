<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Staff;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins|unique:doctors|unique:staff',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,doctor,staff',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        switch ($request->role) {
            case 'admin':
                Admin::create($data);
                break;
            case 'doctor':
                Doctor::create($data);
                break;
            case 'staff':
                Staff::create($data);
                break;
        }

        return redirect()->route('loginPage')->with('success', 'Registration successful.');
    }
}
