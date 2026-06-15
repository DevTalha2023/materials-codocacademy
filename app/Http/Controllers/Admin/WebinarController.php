<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Webinar\StoreWebinarRequest;
use App\Http\Requests\Webinar\UpdateWebinarRequest;
use App\Models\Webinar;
use App\Services\Webinar\WebinarService;

class WebinarController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage webinars');
    }

    public function index()
    {
        $webinars = Webinar::latest()
            ->paginate(20);

        return view(
            'admin.webinars.index',
            compact('webinars')
        );
    }

    public function create()
    {
        return view(
            'admin.webinars.create'
        );
    }

    public function store(
        StoreWebinarRequest $request,
        WebinarService $service
    ) {
        $service->create(
            $request->validated()
        );

        return redirect()
            ->route('admin.webinars.index')
            ->with(
                'success',
                'Webinar created successfully.'
            );
    }

    public function edit(Webinar $webinar)
    {
        return view(
            'admin.webinars.edit',
            compact('webinar')
        );
    }

    public function update(
        UpdateWebinarRequest $request,
        Webinar $webinar,
        WebinarService $service
    ) {
        $service->update(
            $webinar,
            $request->validated()
        );

        return back()
            ->with(
                'success',
                'Webinar updated.'
            );
    }
}
