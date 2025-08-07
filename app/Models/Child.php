<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Child extends Model
{
    /** @use HasFactory<\Database\Factories\ChildFactory> */
    use HasFactory;

    public function guardians(): BelongsToMany
    {
        return $this->belongsToMany(Guardian::class, Relationship::class);
    }

    public function servicesAttended(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, Attendee::class);
    }
}
