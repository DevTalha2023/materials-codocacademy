<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    protected $fillable = [
        'webinar_id',
        'title',
        'original_filename',
        'stored_filename',
        'file_path',
        'file_size',
        'mime_type',
        'version',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function webinar(): BelongsTo
    {
        return $this->belongsTo(Webinar::class);
    }

    public function views()
    {
        return $this->hasMany(
            MaterialView::class
        );
    }
}
