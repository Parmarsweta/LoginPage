<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'emergency_contact_phone',
        'medical_history',
        'allergies',
        'current_medications',
        'doctor_assigned_id',
        'status',
    ];

}
