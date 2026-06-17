<div class="card border-0 shadow-sm h-100">

    <div class="card-body">

        <div class="mb-3">
            <img src="{{ $webinar->thumbnail ? asset('storage/' . $webinar->thumbnail) : 'https://placehold.co/600x300?text=Webinar' }}"
                class="img-fluid rounded">
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

        <a href="{{ route('student.webinars.show', $webinar) }}" class="btn btn-primary">
            View Webinar
        </a>

    </div>

</div>
