<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Show form with pre-filled data
    public function edit($slug)
    {
        $patient = Patient::where('slug', $slug)->firstOrFail();
        return view('patient.edit', compact('patient'));
    }

    // Handle form submission and update data
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $patient = Patient::where('slug', $slug)->firstOrFail();

        $patient->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Patient updated successfully!');
    }
}
