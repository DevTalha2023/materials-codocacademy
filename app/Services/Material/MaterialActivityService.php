<?php

namespace App\Services\Material;

use App\Models\Material;
use App\Models\MaterialView;
use App\Models\User;

class MaterialActivityService
{
    public function record(
        User $user,
        Material $material
    ): void {

        MaterialView::create([
            'user_id' => $user->id,
            'material_id' => $material->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'viewed_at' => now(),
        ]);
    }
}
