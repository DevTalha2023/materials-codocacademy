<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use App\Services\Webinar\WebinarDetailsService;

class WebinarController extends Controller
{
    public function __construct(
        private readonly WebinarDetailsService $webinarDetailsService
    ) {
    }

    public function show(
        Webinar $webinar
    ) {

        $webinar =
            $this->webinarDetailsService
                ->getDetails(
                    auth()->user(),
                    $webinar
                );

        return view(
            'webinars.show',
            compact('webinar')
        );
    }
}
