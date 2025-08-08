<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Child::class, Attendance::class);
    }

    public function notCheckedOutChildren(): BelongsToMany
    {
        return $this->belongsToMany(Child::class, Attendance::class)
            ->wherePivotNull('checked_out_at');
    }
}
