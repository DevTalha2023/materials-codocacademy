@props(['webinars'])
<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            Access Expiring Soon
        </h5>

    </div>

    <div class="card-body">

        @forelse($webinars as $webinar)
            <div class="border rounded p-3 mb-3">

                <h6 class="mb-2">
                    {{ $webinar->title }}
                </h6>

                <small class="text-danger">

                    Expires in

                    {{ now()->diffInDays($webinar->pivot->expires_at) }}

                    Days

                </small>

            </div>

        @empty

            <p class="text-muted mb-0">
                No upcoming expirations.
            </p>
        @endforelse

    </div>

</div>
