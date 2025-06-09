<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di BlowMap</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4a6bff;
            --primary-dark: #3a54cc;
            --secondary: #f5f7fa;
            --accent: #ff7e5f;
            --text: #2c3e50;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            --shadow-hover: 0 16px 50px rgba(0, 0, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e0e7ff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text);
            overflow-x: hidden;
        }

        .welcome-container {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Background Decorative Circles */
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(74, 107, 255, 0.1);
            z-index: 0;
        }

        .bg-circle:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -50px;
        }

        .bg-circle:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
        }

        /* Card Styling */
        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 48px;
            max-width: 680px;
            width: 100%;
            backdrop-filter: blur(8px);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            z-index: -1;
        }

        .welcome-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-8px);
        }

        /* Logo & Title */
        .logo-img {
            width: 160px;
            height: auto;
            margin-bottom: 24px;
            filter: drop-shadow(0 6px 12px rgba(74, 107, 255, 0.3));
            animation: float 3s ease-in-out infinite;
        }

        .welcome-title {
            font-weight: 900;
            color: var(--text);
            font-size: 2.8rem;
            margin-bottom: 24px;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .welcome-subtitle {
            color: var(--text-light);
            font-size: 1.3rem;
            margin-bottom: 40px;
            line-height: 1.5;
        }

        /* Button */
        .btn-welcome {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 50px;
            padding: 16px 48px;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--white);
            transition: all 0.3s;
            box-shadow: 0 6px 20px rgba(74, 107, 255, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-welcome:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(74, 107, 255, 0.4);
            color: var(--white);
        }

        .btn-welcome i {
            margin-right: 10px;
        }

        .btn-welcome::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(30deg);
            transition: all 0.3s;
        }

        .btn-welcome:hover::after {
            left: 100%;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            font-size: 0.95rem;
            color: var(--text-light);
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-card {
                padding: 32px;
            }

            .welcome-title {
                font-size: 2.2rem;
            }

            .welcome-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <!-- Background Circles -->
        <div class="bg-circle"></div>
        <div class="bg-circle"></div>
        <!-- Main Card -->
        <div class="welcome-card">
            <img src="{{ asset('images/logo-dashboard.png') }}" alt="Logo BlowMap" class="logo-img">
            <h1 class="welcome-title">Selamat Datang di BlowMap</h1>
            <p class="welcome-subtitle">
                Kelola data lokasi, kartu keluarga, dan anggota keluarga dengan mudah dan cepat.
            </p>
            <div class="vstack gap-3 col-12 col-md-8 mx-auto">
                <a href="{{ route('login') }}" class="btn btn-welcome">
                    <i class="fas fa-sign-in-alt me-2"></i> login
                </a>
                <a href="{{ route('register') }}" class="btn btn-welcome"
                    style="background: linear-gradient(135deg, #ff7e5f 0%, #ffb88c 100%);">
                    <i class="fas fa-user-plus me-2"></i> regis
                </a>
            </div>

            <div class="footer">
                &copy; {{ date('Y') }} BlowMap. All rights reserved.
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
