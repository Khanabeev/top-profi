<?php


namespace App\Traits;


use App\Models\Location;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLocations
{

    /**
     * @return MorphMany
     */
    public function locations(): MorphMany
    {
        return $this->morphMany(Location::class, 'locatable');
    }

}
