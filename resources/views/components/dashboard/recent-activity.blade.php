<div class="card border-0 shadow-sm">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            Recent Activity
        </h5>

    </div>

    <div class="card-body">

        <table class="table">

            <thead>
                <tr>
                    <th>Material</th>
                    <th>Webinar</th>
                    <th>Viewed</th>
                </tr>
            </thead>

            <tbody>

                @forelse($activities
                as $activity)
                    <tr>

                        <td>
                            {{ $activity->material->title }}
                        </td>

                        <td>
                            {{ $activity->material->webinar->title }}
                        </td>

                        <td>
                            {{-- {{ \Carbon\Carbon::parse($activity->viewed_at)->diffForHumans() }} --}}
                            {{ $activity->viewed_at->diffForHumans() }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3">
                            No activity yet.
                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>
