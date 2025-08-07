<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Attendee extends Pivot
{
    /** @use HasFactory<\Database\Factories\AttendeeFactory> */
    use HasFactory;

    protected $table = 'attendees';

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function checkedInBy(): BelongsTo
    {
        return $this->belongsTo(Guardian::class, 'checked_in_by');
    }

    public function checkedOutBy(): BelongsTo
    {
        return $this->belongsTo(Guardian::class, 'checked_out_by');
    }
}
