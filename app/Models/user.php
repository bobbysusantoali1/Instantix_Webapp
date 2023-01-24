<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'fullName',
        'email',
        'password',
        'dob',
        'gender',
        'address',
        'phoneNumber'
    ];


}
