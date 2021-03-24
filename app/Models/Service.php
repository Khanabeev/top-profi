<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'is_active'
    ];

    const SERVICE_MANICURE = 'manicure';
    const SERVICE_PEDICURE = 'pedicure';

    /**
     * @return MorphTo
     */
    public function serviceable(): MorphTo
    {
        return $this->morphTo();
    }
}
