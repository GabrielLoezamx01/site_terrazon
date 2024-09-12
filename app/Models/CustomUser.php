<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'custom_users';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'cell_phone',
        'email',
        'password',
        'terms_accepted',
    ];

    protected $hidden = [
        'password',
    ];
}
