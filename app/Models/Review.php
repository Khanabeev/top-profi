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

    const STATUS_ACTIVE = 'active';
    const STATUS_MODERATION = 'moderation';
    const STATUS_BANNED = 'banned';


    /**
     * @return MorphTo
     */
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
