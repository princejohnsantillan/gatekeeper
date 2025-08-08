<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Child extends Model
{
    /** @use HasFactory<\Database\Factories\ChildFactory> */
    use HasFactory;

    /** @return BelongsToMany<Guardian, $this> */
    public function guardians(?bool $authorized = null): BelongsToMany
    {
        $guardians = $this->belongsToMany(Guardian::class, Relationship::class);

        if ($authorized !== null) {
            return $guardians->wherePivot('is_authorized_guardian', $authorized);
        }

        return $guardians;
    }

    /** @return BelongsToMany<Service, $this> */
    public function servicesAttended(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, Attendance::class);
    }
}
