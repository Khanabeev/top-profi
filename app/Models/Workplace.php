<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Workplace extends Model
{
    use HasFactory;

    const AT_MY_HOME = 1;
    const AT_BEAUTY_SALON = 2;
    const AT_YOUR_HOME = 3;

    /**
     * @return MorphTo
     */
    public function workplaceable(): MorphTo
    {
        return $this->morphTo();
    }
}
