@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="row g-4">

            <div class="col-md-3">
                <x-dashboard.stat-card :value="$assignedWebinars" title="Assigned Webinars" subtitle="Total webinars assigned"
                    icon="📺" />
            </div>

            <div class="col-md-3">
                <x-dashboard.stat-card :value="$availableMaterials" title="Available Materials" subtitle="PDF & PPT materials"
                    icon="📄" />
            </div>

            <div class="col-md-3">
                <x-dashboard.stat-card :value="$activeAccess" title="Active Access" subtitle="Webinars with active access"
                    icon="🔐" />
            </div>

            <div class="col-md-3">
                <x-dashboard.stat-card :value="$daysUntilExpiry ?? 0" title="Days Until Next Expiry" subtitle="Nearest access expiry"
                    icon="📅" />
            </div>

        </div>

    </div>

    <div class="row mt-5">

        <div class="col-lg-8">

            <div class="d-flex justify-content-between mb-3">

                <h4>
                    My Webinars
                </h4>

                <a href="#">
                    View All
                </a>

            </div>

            <div class="row">

                @foreach ($webinars as $webinar)
                    <div class="col-md-6 mb-4">

                        <x-dashboard.webinar-card :webinar="$webinar" />

                    </div>
                @endforeach

            </div>

        </div>

        <div class="col-lg-4">

            <x-dashboard.recent-activity :activities="$recentActivities" />

            <div class="mt-4">

                <x-dashboard.expiring-access :webinars="$expiringAccess" />

            </div>

        </div>

    </div>

@endsection
