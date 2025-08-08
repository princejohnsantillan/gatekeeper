<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guardian extends Model
{
    /** @use HasFactory<\Database\Factories\GuardianFactory> */
    use HasFactory;

    /** @return BelongsToMany<Child, $this> */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Child::class, Relationship::class);
    }
}
