<?php

declare(strict_types=1);


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Attendee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_registered',
    ];

    protected $casts = [
        'is_registered' => 'boolean',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
