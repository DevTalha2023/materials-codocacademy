<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\MaterialView;


#[Fillable(['attendee_id', 'name', 'email', 'password', 'is_registered'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     *
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function attendee(): BelongsTo
    {
        return $this->belongsTo(Attendee::class);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }
    public function isStudent(): bool
    {
        return $this->hasRole('Student');
    }

    public function webinars(): BelongsToMany
    {
        return $this->belongsToMany(
            Webinar::class,
            'webinar_user'
        )
            ->withPivot([
                'assigned_at',
                'expires_at',
            ])
            ->withTimestamps();
    }

    public function materialViews(): HasMany
    {
        return $this->hasMany(
            MaterialView::class
        );
    }


}
