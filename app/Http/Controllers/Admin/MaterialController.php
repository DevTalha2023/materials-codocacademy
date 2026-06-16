<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\StoreMaterialRequest;
use App\Models\Webinar;
use App\Services\Material\MaterialService;
use Illuminate\Http\RedirectResponse;

class MaterialController extends Controller
{
    public function __construct(
        private readonly MaterialService $materialService
    ) {
    }

    public function store(
        StoreMaterialRequest $request,
        Webinar $webinar
    ): RedirectResponse {

        $this->materialService->upload(
            webinar: $webinar,
            file: $request->file('file'),
            title: $request->string('title')->toString()
        );

        return back()->with(
            'success',
            'Material uploaded successfully.'
        );
    }
}
