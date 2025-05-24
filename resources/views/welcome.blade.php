<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Blow Map</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            backdrop-filter: blur(10px);
        }

        .welcome-title {
            font-weight: 800;
            color: #2c3e50;
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .welcome-subtitle {
            color: #7f8c8d;
            font-size: 1.2rem;
            margin-bottom: 40px;
        }

        .btn-welcome {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            border: none;
            border-radius: 50px;
            padding: 14px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-welcome:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.4);
        }

        .welcome-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #3498db;
        }

        .min-vh-100 {
            min-height: 100vh;
        }

        .footer {
            margin-top: 40px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="welcome-card text-center">
            <i class="fas fa-map-marked-alt welcome-icon"></i>
            <h1 class="welcome-title">Selamat Datang di Blow Map</h1>
            <p class="welcome-subtitle">
                Kelola data lokasi, kartu keluarga, dan anggota keluarga dengan mudah dan cepat.
            </p>
            <a href="{{ route('lokasi.index') }}" class="btn btn-welcome">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk
            </a>
            <div class="footer mt-4">
                &copy; {{ date('Y') }} Blow Map. All rights reserved.
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
