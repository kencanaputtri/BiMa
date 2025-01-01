<!DOCTYPE html>
<html lang="en">
<head>
    <title>BiMa - Masuk</title>
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
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 12px;
            font-weight: 500;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-primary:hover {
            background-color: #038d0b;
        }
        
        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }
        
        .divider::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }
        
        .divider::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="logo">
                <a href="index.php">BiMa</a>
            </div>
            
            <form action="proses_register.php" method="POST">
                <div class="form-group">
                    <label class="form-label">NPM</label>
                    <input type="text" class="form-control" name="npm" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required 
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                           title="Minimal 8 karakter, harus mengandung huruf besar, huruf kecil dan angka">
                </div>
                <a href="home.php" class="btn btn-primary btn-block" role="button">Masuk</a>
                
                <div class="divider">atau</div>
                
                <button type="button" class="btn btn-outline-secondary btn-block">
                    <img src="images/google.png" alt="Google" style="width: 20px; margin-right: 8px;">
                    Masuk dengan Google
                </button>
            </form>
            
            <div class="terms">
                Dengan mendaftar, saya menyetujui<br>
                <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
            </div>
            
            <div class="login-link">
                Belum punya akun? <a href="regist.php">Daftar</a>
            </div>
        </div>
    </div>
</body>
</html>