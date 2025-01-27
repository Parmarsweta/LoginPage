<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $table = 'doctors';

    protected $fillable = ['name','email','password','role',];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
