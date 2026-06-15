<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Webinar extends Model
{
    protected $fillable = [
        'title',
        'description',
        'webinar_date',
        'completion_date',
        'access_duration_days',
        'is_active',
    ];

    protected $casts = [
        'webinar_date' => 'date',
        'completion_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'webinar_user'
        );
    }
}
