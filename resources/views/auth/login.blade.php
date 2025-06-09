<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BlowMap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            100% {
                transform: translate(-50px, -50px) rotate(360deg);
            }
        }

        .login-container {
            position: relative;
            z-index: 1;
            max-width: 420px;
            width: 100%;
            margin: 20px;
        }

        .card-login {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            padding: 40px 35px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .card-login:hover {
            transform: translateY(-5px);
            box-shadow:
                0 35px 60px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .logo-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .logo-img:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .logo-icon {
            font-size: 32px;
            color: white;
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-floating {
            margin-bottom: 20px;
            position: relative;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px 20px 16px 50px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            height: 60px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
            z-index: 3;
        }

        .form-label {
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            border-radius: 16px;
            padding: 16px 0;
            font-size: 16px;
            border: none;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            margin-bottom: 20px;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #94a3b8;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            padding: 0 20px;
            font-size: 14px;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: #764ba2;
            text-shadow: 0 0 10px rgba(102, 126, 234, 0.3);
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }

        .alert {
            border-radius: 12px;
            margin-bottom: 20px;
            border: none;
            padding: 16px 20px;
        }

        .alert-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .card-login {
                padding: 30px 25px;
                margin: 15px;
            }

            .login-title {
                font-size: 24px;
            }

            .form-control {
                padding: 14px 18px 14px 45px;
                height: 55px;
            }

            .input-icon {
                left: 15px;
                font-size: 16px;
            }
        }

        /* Loading animation */
        .btn-login.loading {
            position: relative;
            color: transparent;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Password visibility toggle */
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            font-size: 16px;
            z-index: 3;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card-login">
            <div class="logo-container">
                <div class="logo-img">
                    <i class="fas fa-map-marked-alt logo-icon"></i>
                </div>
                <h2 class="login-title">Selamat Datang</h2>
                <p class="login-subtitle">Masuk ke akun BlowMap Anda</p>
            </div>

            <!-- Alert Messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login.action') }}" method="POST" id="loginForm">
                @csrf

                <div class="form-floating">

                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan email Anda" required autofocus value="{{ old('email') }}">
                    <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                </div>

                <div class="form-floating">

                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan password Anda" required>
                    <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
                    <i class="fas fa-eye-slash password-toggle" id="togglePassword"></i>
                </div>

                <button type="submit" class="btn btn-login" id="loginBtn">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Masuk ke BlowMap
                </button>
            </form>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="register-link">
                <p class="mb-0">Belum punya akun?
                    <a href="{{ route('register') }}">
                        <i class="fas fa-user-plus me-1"></i>
                        Daftar Sekarang
                    </a>
                </p>
            </div>

            <div class="footer">
                <p class="mb-0">
                    <i class="fas fa-copyright me-1"></i>
                    {{ date('Y') }} BlowMap. Semua hak dilindungi.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });

        // Form validation enhancement
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#ef4444';
                } else {
                    this.style.borderColor = '#10b981';
                }
            });

            input.addEventListener('focus', function() {
                this.style.borderColor = '#667eea';
            });
        });
    </script>
</body>

</html>
