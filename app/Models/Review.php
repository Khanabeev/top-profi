<?php

namespace App\Models;

use App\Traits\HasPhotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    use HasFactory, HasPhotos;

    protected $fillable = [
        "user_id",
        "rating",
        "content",
        "status"
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_MODERATION = 2;
    const STATUS_BANNED = 3;


    /**
     * @return MorphTo
     */
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
