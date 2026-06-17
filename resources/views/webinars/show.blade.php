@extends('layouts.dashboard')

@section('page-title', $webinar->title)

@section('content')

    <div class="card">

        <div class="card-body">

            <h2>
                {{ $webinar->title }}
            </h2>

            <p>
                {{ $webinar->description }}
            </p>

            <hr>

            <strong>Webinar Date:</strong>
            {{ $webinar->webinar_date->format('d M Y') }}

            <br>

            <strong>Completion Date:</strong>
            {{ $webinar->completion_date->format('d M Y') }}

        </div>

    </div>

@endsection
