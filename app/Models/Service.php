<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperService
 */
class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    /** @return BelongsToMany<Child, $this> */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Child::class, Attendance::class);
    }

    /** @return BelongsToMany<Child, $this> */
    public function notCheckedOutChildren(): BelongsToMany
    {
        return $this->belongsToMany(Child::class, Attendance::class)
            ->wherePivotNull('checked_out_at');
    }

    /** @return BelongsTo<Organization, $this> */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
