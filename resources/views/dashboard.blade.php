{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
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

        <div class="col-12">

            <div class="d-flex justify-content-between mb-3">

                <h4>
                    My Webinars
                </h4>

                <a href="#">
                    View All
                </a>

            </div>

        </div>

        @foreach ($webinars as $webinar)
            <div class="col-md-4 mb-4">

                <x-dashboard.webinar-card :webinar="$webinar" />

            </div>
        @endforeach

    </div>

@endsection
