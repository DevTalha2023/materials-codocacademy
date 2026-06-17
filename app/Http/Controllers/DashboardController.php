<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\DashboardService;

class DashboardController extends Controller
{
    public function __construct(
        private readonly DashboardService $dashboardService
    ) {
    }

    public function index()
    {
        $data =
            $this->dashboardService
                ->getStudentDashboardData(
                    auth()->user()
                );

        return view(
            'dashboard',
            $data
        );
    }
}
