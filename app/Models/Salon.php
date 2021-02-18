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

class Salon extends Model
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
        "description",
        "experience_from",
        "is_working_with_men",
        "has_single_use_items",
        "instagram",
        "phone_number",
        "has_whatsapp",
        "materials"
    ];

    const STATUS_ACTIVE_PAID = 1;
    const STATUS_ACTIVE_UNPAID = 2;
    const STATUS_MODERATION = 3;
    const STATUS_BANNED = 4;
    const STATUS_PAUSED = 5;

    /**
     * @return BelongsToMany
     */
    public function masters(): BelongsToMany
    {
        return $this->belongsToMany(Master::class);
    }


}
