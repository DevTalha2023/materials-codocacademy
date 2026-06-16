<x-app-layout>

    <div class="container-fluid">


        <div class="row mb-3">
            <div class="col">
                <h3>{{ $material->title }}</h3>

                <p class="text-muted">
                    {{ $material->webinar->title }}
                </p>
            </div>
        </div>

        <iframe src="{{ route('materials.view', $material) }}" width="100%" height="900">
        </iframe>


    </div>

</x-app-layout>
