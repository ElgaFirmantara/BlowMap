<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - BlowMap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            padding: 10px 0;
        }

        .register-container {
            max-width: 450px;
            width: 100%;
            margin: 10px;
            z-index: 1;
        }

        .card-register {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.14);
            padding: 18px 20px 20px 18px;
            border: 1px solid rgba(255, 255, 255, 0.13);
            transition: all 0.3s;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 13px;
        }

        .logo-img {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 7px;
            box-shadow: 0 6px 18px rgba(255, 107, 107, 0.18);
        }

        .logo-icon {
            font-size: 20px;
            color: white;
        }

        .register-title {
            font-size: 18px;
            font-weight: 700;
            background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 2px;
        }

        .register-subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 12px;
            font-size: 11px;
        }

        .form-group {
            margin-bottom: 8px;
            position: relative;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 2px;
            display: block;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 9px;
            padding: 7px 12px;
            font-size: 13px;
            background: rgba(255, 255, 255, 0.95);
            height: 36px;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 2px rgba(255, 107, 107, 0.09);
            background: #fff;
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            font-size: 13px;
            z-index: 3;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #ff6b6b;
        }

        .btn-register {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
            color: white;
            font-weight: 600;
            border-radius: 9px;
            padding: 10px 0;
            font-size: 14px;
            border: none;
            width: 100%;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.18);
            margin-bottom: 7px;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #ffa726 0%, #ff6b6b 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.22);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 10px 0;
            color: #94a3b8;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            padding: 0 10px;
        }

        .login-link {
            text-align: center;
            margin-top: 6px;
            font-size: 12px;
        }

        .login-link a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .login-link a:hover {
            color: #ffa726;
            text-shadow: 0 0 8px rgba(255, 107, 107, 0.17);
        }

        .footer {
            margin-top: 10px;
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 10px;
            border: none;
            padding: 10px 13px;
            font-size: 12px;
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
            padding-left: 18px;
        }

        @media (max-width: 576px) {
            .card-register {
                padding: 14px 7px 10px 7px;
                margin: 10px;
            }

            .register-title {
                font-size: 16px;
            }

            .form-control {
                padding: 6px 9px;
                height: 32px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="card-register">
            <div class="logo-container">
                <div class="logo-img">
                    <i class="fas fa-user-plus logo-icon"></i>
                </div>
                <h2 class="register-title">Bergabung Sekarang</h2>
                <p class="register-subtitle">Buat akun BlowMap baru Anda</p>
            </div>

            @if (session('message'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('message') }}
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

            <form action="{{ route('actionregister') }}" method="POST" id="registerForm">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user me-2"></i>Nama Lengkap
                    </label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama lengkap Anda" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email Address
                    </label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan email Anda" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock me-2"></i>Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Buat password yang kuat" required>
                    <i class="fas fa-eye-slash password-toggle" id="togglePassword"></i>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-shield-alt me-2"></i>Konfirmasi Password
                    </label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Ulangi password Anda" required>
                    <i class="fas fa-eye-slash password-toggle" id="toggleConfirmPassword"></i>
                </div>
                <button type="submit" class="btn btn-register" id="registerBtn">
                    <i class="fas fa-user-plus me-2"></i>
                    Daftar ke BlowMap
                </button>
            </form>

            <div class="divider"><span>atau</span></div>
            <div class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i>Masuk di Sini</a>
            </div>
            <div class="footer">
                <i class="fas fa-copyright me-1"></i>
                {{ date('Y') }} BlowMap. Semua hak dilindungi.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const password = document.getElementById('password_confirmation');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
