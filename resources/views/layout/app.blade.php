<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <style>

            body {
                background-color: #f5f7fb;
                overflow-x: hidden;
            }

            .sidebar {
                width: 260px;
                min-height: 100vh;
                background-color: #0d6efd;
                color: white;
                position: fixed;
                left: 0;
                top: 0;
                padding: 25px 20px;
            }

            .sidebar .brand {
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 40px;
            }

            .sidebar .nav-link {
                color: rgba(255,255,255,0.85);
                padding: 12px 15px;
                border-radius: 10px;
                margin-bottom: 8px;
                transition: .3s;
            }

            .sidebar .nav-link:hover,
            .sidebar .nav-link.active {
                background-color: rgba(255,255,255,0.15);
                color: white;
            }

            .main-content {
                margin-left: 260px;
                padding: 25px;
            }

            .topbar {
                background: white;
                padding: 15px 20px;
                border-radius: 14px;
                margin-bottom: 25px;
            }

            .card {
                border: none;
                border-radius: 14px;
            }

        </style>
    </head>
    <body>

        {{-- Sidebar --}}
        @include('components.sidebar')

        <div class="main-content">

            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Main Content --}}
            @yield('content')

        </div>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @include('validations.notifications')
</html>