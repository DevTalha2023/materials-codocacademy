<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'webinar_user'
        )
            ->withPivot([
                'assigned_at',
                'expires_at',
            ])
            ->withTimestamps();
    }
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}