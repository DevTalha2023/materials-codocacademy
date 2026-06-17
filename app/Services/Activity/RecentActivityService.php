<?php

namespace App\Services\Activity;

use App\Models\User;

class RecentActivityService
{
    public function getRecentActivities(
        User $user,
        int $limit = 5
    ) {

        return $user
            ->materialViews()
            ->with([
                'material.webinar'
            ])
            ->latest('viewed_at')
            ->take($limit)
            ->get();
    }
}
