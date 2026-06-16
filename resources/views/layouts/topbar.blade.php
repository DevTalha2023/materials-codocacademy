<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            @yield('page-title')
        </h2>

        <p class="text-muted mb-0">
            Welcome back,
            {{ auth()->user()->name }}
        </p>
    </div>

    <div class="d-flex align-items-center gap-3">

        <button class="btn btn-light rounded-circle">
            <i class="bi bi-bell"></i>
        </button>

        <div class="d-flex align-items-center gap-2">

            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" class="rounded-circle"
                width="40">

            <span class="fw-semibold">
                {{ auth()->user()->name }}
            </span>

        </div>

    </div>

</div>
