<?php

namespace App\Services\Webinar;

use App\Models\User;
use App\Models\Webinar;

class WebinarDetailsService
{
    public function getDetails(
        User $user,
        Webinar $webinar
    ): Webinar {

        return $user
            ->webinars()
            ->with('materials')
            ->findOrFail(
                $webinar->id
            );
    }
}
