<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Relationship extends Pivot
{
    protected function casts()
    {
        return [
            'relationship_type' => \App\Enums\Relationship::class,
            'is_authorized_guardian' => 'boolean',
        ];
    }

    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
