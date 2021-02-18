<?php

namespace App\Models;

use App\Traits\HasReviews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasReviews;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return BelongsToMany
     */
    public function favoriteMasters(): BelongsToMany
    {
        return $this->belongsToMany(Master::class, 'favorite_master');
    }

    /**
     * @param array $ids
     */
    public function addFavoriteMasters(array $ids)
    {
        if (is_array($ids))
            $ids = collect($ids);

        $existing_ids = $this->favoriteMasters()
            ->whereIn('master_id', $ids)
            ->pluck('master_id');

        if($res = $ids->diff($existing_ids))
            $this->favoriteMasters()->attach($res);
    }

    /**
     * @param array $ids
     */
    public function removeFavoriteMasters(array $ids)
    {
        $this->favoriteMasters()->detach($ids);
    }

}
