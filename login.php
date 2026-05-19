<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Praktikum PHP</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .login-card {
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-radius: 1rem;
        }

        .login-card .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 1rem 1rem 0 0;
        }

        .login-card .card-body {
            padding: 2.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
        }

        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #e3e6f0;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.15rem 1.75rem 0 rgba(102, 126, 234, 0.4);
            color: #fff;
        }

        .brand-text {
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .divider {
            border-top: 1px solid #e3e6f0;
            margin: 1.5rem 0;
        }

        .signup-link {
            text-align: center;
            color: #6c757d;
            margin-top: 1.5rem;
        }

        .signup-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
    </style>
</head>

<body class="login-container">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">

                <!-- Login Card -->
                <div class="card login-card mt-4 shadow-lg border-0">

                    <!-- Card Header -->
                    <div class="card-header py-4">
                        <h1 class="brand-text mb-0">
                            <i class="fas fa-shopping-cart"></i> Praktikum
                        </h1>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="login-header">
                            <h4 class="text-gray-800 font-weight-bold mb-2">Selamat Datang</h4>
                            <p class="text-gray-600 small">Silahkan login untuk melanjutkan</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="process_login.php">

                            <!-- Username Field -->
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Masukkan username Anda" required autofocus>
                            </div>

                            <!-- Password Field -->
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Masukkan password Anda" required>
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-login btn-block w-100 text-white">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>

                        </form>

                        <!-- Forgot Password Link -->
                        <div class="divider"></div>
                        <a href="#" class="forgot-password d-block text-center">
                            <i class="fas fa-question-circle"></i> Lupa Password?
                        </a>

                        <!-- Signup Link -->
                        <div class="signup-link">
                            Belum punya akun? <a href="#">Daftar di sini</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>