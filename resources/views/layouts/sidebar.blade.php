<div class="sidebar bg-white border-end vh-100 position-fixed" style="width:280px;">

    <div class="text-center py-4">
        <img src="{{ asset('images/coDoc_logo.png') }}" alt="CoDoc Academy" style="max-width:140px;">
    </div>

    <div class="px-3">

        <small class="text-muted text-uppercase">
            Main
        </small>

        <ul class="nav flex-column mt-3">

            <li class="nav-item mb-2">
                <a href="#" class="nav-link active">
                    <i class="bi bi-grid"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link">
                    <i class="bi bi-display"></i>
                    My Webinars
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('materials.index') }}" class="nav-link">
                    <i class="bi bi-file-earmark-text"></i>
                    My Materials

                </a>
            </li>

        </ul>

    </div>

</div>
