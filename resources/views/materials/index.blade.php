@extends('layouts.dashboard')

@section('page-title', 'My Materials')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h4 class="mb-0">
                My Materials
            </h4>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>Title</th>
                            <th>Webinar</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th width="120">
                                Action
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($materials as $material)
                            <tr>

                                <td>
                                    {{ $material->title }}
                                </td>

                                <td>
                                    {{ $material->webinar->title }}
                                </td>

                                <td>
                                    {{ strtoupper(pathinfo($material->original_filename, PATHINFO_EXTENSION)) }}
                                </td>

                                <td>
                                    {{ round($material->file_size / 1024, 2) }}
                                    KB
                                </td>

                                <td>

                                    <a href="{{ route('materials.viewer', $material) }}"
                                        class="btn btn-sm btn-primary">

                                        View

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">

                                    No materials found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
