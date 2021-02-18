<?php


namespace App\Traits;


use App\Models\Schedule;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasSchedules
{
    /**
     * @return MorphMany
     */
    public function schedules(): MorphMany
    {
        return $this->morphMany(Schedule::class, 'scheduleable');
    }
}
