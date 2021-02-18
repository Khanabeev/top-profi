<?php


namespace App\Traits;


use App\Models\Workplace;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasWorkplaces
{
    /**
     * @return MorphMany
     */
    public function workplaces(): MorphMany
    {
        return $this->morphMany(Workplace::class, 'workplaceable');
    }

}
