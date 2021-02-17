<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'city_id',
        'address'
    ];

    /**
     * @return MorphTo
     */
    public function locatable(): MorphTo
    {
        return $this->morphTo();
    }
}
