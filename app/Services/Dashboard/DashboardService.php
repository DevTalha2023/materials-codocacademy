<?php

namespace App\Services\Dashboard;

use App\Models\Material;
use App\Models\User;
use App\Services\Activity\RecentActivityService;

class DashboardService
{

    public function __construct(
        private readonly RecentActivityService $recentActivityService
    ) {
    }
    public function getStudentDashboardData(
        User $user,

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
        $webinars = $user->webinars()
            ->withCount('materials')
            ->get();

        $recentActivities =
            $this->recentActivityService
                ->getRecentActivities(
                    $user
                );

        $expiringAccess =
            $user->webinars()
                ->wherePivot(
                    'expires_at',
                    '<=',
                    now()->addDays(7)
                )
                ->wherePivot(
                    'expires_at',
                    '>',
                    now()
                )
                ->get();

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

            'webinars' =>
                $webinars,

            'recentActivities' =>
                $recentActivities,

            'expiringAccess' =>
                $expiringAccess,
        ];
    }
}
