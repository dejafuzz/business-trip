<div class="sidebar">

    <div class="brand">
        {{ Auth::user()->role->level }} Panel
    </div>

    <ul class="nav flex-column">

        @if (Auth::check() && Auth::user()->role_id == '2')
        <li class="nav-item">
            <a
                href="{{ route('employee.business.trips') }}"
                class="nav-link active {{ Request::routeIs('employee.business.trips') ? 'active' : '' }}"
            >
                Pengajuan Perdin
            </a>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->role_id == '1')
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                Manajemen User
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                Role User
            </a>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->role_id == '3')
        <li class="nav-item">
            <a href="{{ route('sdm.cities') }}" class="nav-link {{ Request::routeIs('sdm.cities') ? 'active' : '' }}">
                Pengajuan Perdin
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('sdm.cities') }}" class="nav-link {{ Request::routeIs('sdm.cities') ? 'active' : '' }}">
                Master Kota
            </a>
        </li>
        @endif

    </ul>

</div>