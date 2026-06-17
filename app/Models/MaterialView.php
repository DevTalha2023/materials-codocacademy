<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialView extends Model
{
    protected $fillable = [
        'user_id',
        'material_id',
        'ip_address',
        'user_agent',
        'viewed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
