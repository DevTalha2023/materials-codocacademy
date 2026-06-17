<div class="card border-0 shadow-sm h-100">

    <div class="card-body">

        <div class="mb-3">
            <img
                src="{{ $webinar->thumbnail ? asset('storage/' . $webinar->thumbnail) : asset('images/default-webinar.jpg') }}">
        </div>

        <h5 class="fw-bold">
            {{ $webinar->title }}
        </h5>

        <p class="text-muted mb-2">
            {{ $webinar->materials_count }}
            Materials
        </p>

        <p class="text-danger small">
            Access Expires:
            {{ \Carbon\Carbon::parse($webinar->pivot->expires_at)->format('d M Y') }}
        </p>

        <a href="#" class="btn btn-outline-primary w-100">

            View Materials

        </a>

    </div>

</div>
