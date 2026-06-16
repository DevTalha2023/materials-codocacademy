<?php

namespace App\Services\Material;

use App\Models\Material;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MaterialAccessService
{
    public function getPath(
        User $user,
        Material $material
    ): string {

        Gate::forUser($user)
            ->authorize(
                'view',
                $material
            );

        if (!$material->is_active) {
            throw new AuthorizationException(
                'Material is inactive.'
            );
        }

        if (
            !Storage::disk('private')
                ->exists(
                    $material->file_path
                )
        ) {
            abort(404, 'File not found.');
        }

        return Storage::disk('private')
            ->path(
                $material->file_path
            );
    }
}