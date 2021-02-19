<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nick_name',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'city_id',
        'phone_number',
        'intro',
        'profile',
        'last_login'
    ];

    protected $hidden = [
        'password',
        'phone_number',
        'first_name',
        'middle_name',
        'last_name'
    ];
}
