<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use Notifiable;
    
    protected $table = 'staff';

    protected $fillable = ['name','email','password','role'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
