<?php

namespace App\Services\Dashboard;

use App\Models\Material;
use App\Models\User;

class DashboardService
{
    public function getStudentDashboardData(
        User $user
    ): array {

        $assignedWebinars =
            $user->webinars()->count();

        $activeAccess =
            $user->webinars()
                ->wherePivot(
                    'expires_at',
                    '>',
                    now()
                )
                ->count();

        $availableMaterials =
            Material::whereHas(
                'webinar.users',
                function ($query) use ($user) {
                    $query->where(
                        'users.id',
                        $user->id
                    );
                }
            )->count();

        $nextExpiry =
            $user->webinars()
                ->wherePivot(
                    'expires_at',
                    '>',
                    now()
                )
                ->orderByPivot(
                    'expires_at'
                )
                ->first();

        $daysUntilExpiry = null;

        if ($nextExpiry) {

            $daysUntilExpiry =
                round(
                    now()->diffInDays(
                        $nextExpiry->pivot->expires_at
                    )
                );
        }

        return [
            'assignedWebinars' =>
                $assignedWebinars,

            'activeAccess' =>
                $activeAccess,

            'availableMaterials' =>
                $availableMaterials,

            'nextExpiry' =>
                $nextExpiry,

            'daysUntilExpiry' =>
                $daysUntilExpiry,
        ];
    }
}
