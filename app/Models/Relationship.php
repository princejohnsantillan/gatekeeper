<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @mixin IdeHelperRelationship
 */
class Relationship extends Pivot
{
    /** @use HasFactory<\Database\Factories\RelationshipFactory> */
    use HasFactory;

    protected $table = 'relationships';

    protected function casts()
    {
        return [
            'relationship_type' => \App\Enums\Relationship::class,
            'is_authorized_guardian' => 'boolean',
        ];
    }

    /** @return BelongsTo<Guardian, $this> */
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    /** @return BelongsTo<Child, $this> */
    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
