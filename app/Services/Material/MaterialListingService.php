<?php

namespace App\Services\Material;

use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class MaterialListingService
{
    public function getUserMaterials(
        User $user
    ): Collection {

        return Material::query()
            ->with('webinar')
            ->whereHas(
                'webinar.users',
                function ($query) use ($user) {

                    $query->where(
                        'users.id',
                        $user->id
                    );

                }
            )
            ->latest()
            ->get();
    }
}
