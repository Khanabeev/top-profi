<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Workplace extends Model
{
    use HasFactory;

    const AT_MY_HOME = 'my-home';
    const AT_BEAUTY_SALON = 'beauty-salon';
    const AT_YOUR_HOME = 'your-home';

    /**
     * @return MorphTo
     */
    public function workplaceable(): MorphTo
    {
        return $this->morphTo();
    }
}
