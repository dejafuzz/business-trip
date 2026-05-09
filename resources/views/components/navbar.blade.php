<div class="topbar shadow-sm d-flex justify-content-between align-items-center">

    <div>
        <h5 class="mb-0">
            Dashboard {{ Auth::user()->role->level }}
        </h5>
    </div>

    <div class="d-flex align-items-center">

        <span class="me-3">
            {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-outline-danger btn-sm">
                Logout
            </button>

        </form>

    </div>

</div>