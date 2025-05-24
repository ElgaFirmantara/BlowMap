<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 20px;
            background: #f8f9fa;
        }

        /* Navbar Custom */
        .navbar-custom {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 0.5rem 1rem;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-custom .navbar-brand i {
            margin-right: 8px;
        }

        .navbar-custom .navbar-toggler {
            border: none;
            color: white;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .navbar-custom .navbar-nav .nav-link:hover,
        .navbar-custom .navbar-nav .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
        }

        .container {
            max-width: 1200px;
        }

        /* Style untuk dashboard */
        .dashboard-header {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
            transition: all 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 2.5rem;
            color: #3498db;
            margin-bottom: 15px;
        }

        .card-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: #3498db;
            margin-bottom: 5px;
        }

        .card-subtitle {
            color: #7f8c8d;
            font-size: 1rem;
        }

        .footer {
            width: 100vw;
            left: 0;
            right: 0;
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 1.2rem 0;
            margin-top: 2rem;
            position: relative;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-dashboard.png') }}" alt="Logo BlowMap"
                        style="height: 40px; margin-right: 5px;">
                    BlowMap
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                                href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('lokasi') ? 'active' : '' }}"
                                href="{{ url('/lokasi') }}">WebGIS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pengembang') ? 'active' : '' }}"
                                href="{{ url('/pengembang') }}">Pengembang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    <footer class="mt-5 py-4 text-center text-white footer">
        <p>&copy; {{ date('Y') }} WebGIS Laravel</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    @stack('scripts')
</body>

</html>
