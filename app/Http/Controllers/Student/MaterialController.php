<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\Material\MaterialListingService;

class MaterialController extends Controller
{
    public function __construct(
        private readonly MaterialListingService $materialListingService
    ) {
    }

    public function index()
    {
        $materials =
            $this->materialListingService
                ->getUserMaterials(
                    auth()->user()
                );

        return view(
            'materials.index',
            compact('materials')
        );
    }
}
