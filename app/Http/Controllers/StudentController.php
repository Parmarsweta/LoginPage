<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display the form
    public function index()
    {
        return view('students.create');
    }

    // Store data in the database
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', __('messages.data_saved'));
    }
}
