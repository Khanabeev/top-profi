<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'is_active'
    ];

    public function masters()
    {
        return $this->morphedByMany(Master::class, 'serviceable');
    }
}
