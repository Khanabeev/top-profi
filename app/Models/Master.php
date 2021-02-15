<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Master extends Model
{
    use HasFactory;

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

    /**
     * @return MorphMany
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * @return MorphMany
     */
    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'imageable');
    }
}
