<?php

namespace App\Models;

use App\Traits\HasLocations;
use App\Traits\HasPhotos;
use App\Traits\HasReviews;
use App\Traits\HasSchedules;
use App\Traits\HasServices;
use App\Traits\HasWorkplaces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Master extends Model
{
    use HasFactory,
        HasPhotos,
        HasServices,
        HasReviews,
        HasLocations,
        HasWorkplaces,
        HasSchedules;

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

    const STATUS_ACTIVE_PAID = 'active-paid';
    const STATUS_ACTIVE_UNPAID = 'active-unpaid';
    const STATUS_MODERATION = 'moderation';
    const STATUS_BANNED = 'banned';
    const STATUS_PAUSED = 'paused';

    const GENDER_FEMALE = 'female';
    const GENDER_MALE = 'male';

    /**
     * @return BelongsToMany
     */
    public function salons(): BelongsToMany
    {
        return $this->belongsToMany(Salon::class);
    }
}
