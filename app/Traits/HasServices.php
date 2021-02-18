<?php


namespace App\Traits;


use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasServices
{
    /**
     * @return MorphMany
     */
    public function services(): MorphMany
    {
        return $this->morphMany(Service::class, 'serviceable');
    }
}
