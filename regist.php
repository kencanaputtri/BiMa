<!DOCTYPE html>
<html lang="en">
<head>
    <title>BiMa - Daftar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #03AC0E;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
        }
        
        .register-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 576px) {
            .register-container {
                margin: 20px;
                padding: 20px;
            }
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo a {
            color: var(--primary-color);
            font-size: 32px;
            font-weight: bold;
            text-decoration: none;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .form-control {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(3,172,14,0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 12px;
            font-weight: 500;
            width: 100%;
            margin-top: 10px;
            border-radius: 8px;
        }
        
        .btn-primary:hover {
            background-color: #038d0b;
        }
        
        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }
        
        .divider::before {
            left: 0;
        }
        
        .divider::after {
            right: 0;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .terms {
            font-size: 13px;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }
        
        .terms a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .btn-outline-secondary {
            border-color: #ddd;
            color: #666;
            background-color: white;
            padding: 12px;
        }
        
        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            border-color: #ddd;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="logo">
                <a href="index.php">BiMa</a>
            </div>
            
            <form action="saveUser.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label class="form-label">NPM</label>
                    <input type="text" class="form-control" name="npm" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Nomor Ponsel</label>
                    <input type="tel" class="form-control" name="no_telp" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required 
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                           title="Minimal 8 karakter, harus mengandung huruf besar, huruf kecil dan angka">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                
                <div class="divider">atau</div>
                
                <button type="button" class="btn btn-outline-secondary btn-block">
                    <img src="images/google.png" alt="Google" style="width: 20px; margin-right: 8px;">
                    Daftar dengan Google
                </button>
            </form>
            
            <div class="terms">
                Dengan mendaftar, saya menyetujui<br>
                <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
            </div>
            
            <div class="login-link">
                Sudah punya akun? <a href="log.php">Masuk</a>
            </div>
        </div>
    </div>
</body>
</html>