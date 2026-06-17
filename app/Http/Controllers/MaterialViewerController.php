<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialView;
use App\Services\Material\MaterialAccessService;
use App\Services\Material\MaterialActivityService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Gate;

class MaterialViewerController extends Controller
{
    public function __construct(
        private readonly MaterialAccessService $materialAccessService,
        private readonly MaterialActivityService $materialActivityService
    ) {
    }

    public function show(
        Material $material
    ): BinaryFileResponse {

        $path = $this->materialAccessService
            ->getPath(
                auth()->user(),
                $material
            );
        $this->materialActivityService
            ->record(
                auth()->user(),
                $material
            );

        return response()->file($path);
    }

    public function viewer(
        Material $material
    ) {
        Gate::authorize(
            'view',
            $material
        );

        return view(
            'materials.viewer',
            compact('material')
        );
    }
}