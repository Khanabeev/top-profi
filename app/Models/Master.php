<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = "masters";

    protected $fillable = [
        "name",
        "email",
        "password",
        "status",
        "photo",
        "gender",
        "description",
        "experience_from",
        "is_working_with_men",
        "has_single_use_items",
        "instagram",
        "education",
        "phone_number",
        "has_whatsapp",
        "materials"
    ];

    const STATUS_ACTIVE_PAID = 1;
    const STATUS_ACTIVE_UNPAID = 2;
    const STATUS_MODERATION = 3;
    const STATUS_BANNED = 4;

    const GENDER_FEMALE = 1;
    const GENDER_MALE = 2;
}
