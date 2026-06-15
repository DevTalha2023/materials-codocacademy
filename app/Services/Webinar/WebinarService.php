<?php

declare(strict_types=1);

namespace App\Services\Webinar;

use App\Models\Webinar;

class WebinarService
{
    public function create(array $data): Webinar
    {
        return Webinar::create($data);
    }

    public function update(
        Webinar $webinar,
        array $data
    ): Webinar {

        $webinar->update($data);

        return $webinar->refresh();
    }
}
