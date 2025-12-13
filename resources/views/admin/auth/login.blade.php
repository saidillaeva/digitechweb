<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #312e81 75%, #4c1d95 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.3) 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            animation: float 6s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(50px, 50px); }
        }

        .container {
            max-width: 450px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #a855f7);
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3); }
            50% { transform: scale(1.05); box-shadow: 0 12px 32px rgba(59, 130, 246, 0.5); }
        }

        h4 {
            color: #0f172a;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .form-label {
            color: #334155;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .input-group {
            position: relative;
            margin-bottom: 24px;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: #cbd5e1;
        }

        .form-check {
            margin-bottom: 24px;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .form-check-input:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }

        .form-check-label {
            color: #475569;
            font-size: 14px;
            margin-left: 8px;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .footer-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            margin-top: 24px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .footer-text b {
            color: white;
            font-weight: 600;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .input-error {
            animation: shake 0.3s ease;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 32px 24px;
                border-radius: 20px;
            }

            h4 {
                font-size: 24px;
            }
        }

        .form-group {
            margin-bottom: 22px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #64748b;
            pointer-events: none;
        }

        .form-control {
            padding-left: 44px; /* место под иконку */
            height: 52px;
            border-radius: 14px;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="login-card">
        <div class="logo-container">
            <div class="logo">🔐</div>
        </div>

        <h4>Admin Login</h4>
        <p class="subtitle">Enter your credentials to continue</p>

        <form method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
            @csrf

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input
                        class="form-control"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="admin@example.com"
                        required>
                </div>
                @error('email')
                <div class="error-message">⚠ {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input
                        class="form-control"
                        name="password"
                        type="password"
                        placeholder="Enter your password"
                        required>
                </div>
                @error('password')
                <div class="error-message">⚠ {{ $message }}</div>
                @enderror
            </div>

            <div class="form-check d-flex align-items-center gap-2 mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label mb-0" for="remember">
                    Keep me signed in
                </label>
            </div>

            <button type="submit" class="btn-login">
                Sign In
            </button>
        </form>
    </div>

    <div class="footer-text">
        Admin access only: <b>/admin/login</b>
    </div>
</div>

<script>
    // Add smooth focus effects
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateX(4px)';
        });
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateX(0)';
        });
    });

    // Add form submission effect
    const form = document.getElementById('loginForm');
    form.addEventListener('submit', function(e) {
        const btn = this.querySelector('.btn-login');
        btn.innerHTML = '<span style="display: inline-block; animation: spin 1s linear infinite;">⟳</span> Signing in...';
        btn.style.opacity = '0.8';
    });
</script>

<style>
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

</body>
</html>
