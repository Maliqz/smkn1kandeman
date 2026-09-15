<?php

session_start();

include "../config/koneksi.php";


// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}


$error = "";


// ==========================================
// PROSES LOGIN
// ==========================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';


    // Validasi form

    if ($username === '' || $password === '') {

        $error = "Username dan password wajib diisi.";

    } else {

        // Cari username

        $stmt = mysqli_prepare(
            $koneksi,
            "SELECT id, username, password FROM admin WHERE username = ? LIMIT 1"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $username
        );

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $admin = mysqli_fetch_assoc($result);


        // Cek akun

        if ($admin && password_verify($password, $admin['password'])) {

            session_regenerate_id(true);

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            header("Location: index.php");
            exit;

        } else {

            $error = "Username atau password salah.";

        }

    }

}

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login Admin - SMKN 1 Kandeman</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef7f8;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            border: 1px solid #e5e5e5;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-header span {
            display: block;
            margin-bottom: 10px;
            color: #1769aa;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .login-header h1 {
            margin-bottom: 10px;
            font-size: 30px;
        }

        .login-header p {
            color: #777;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #1769aa;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #1769aa;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-login:hover {
            opacity: 0.9;
        }

        .error {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 7px;
            background: #fff0f0;
            color: #c0392b;
            font-size: 14px;
        }

        .back-home {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #1769aa;
            text-decoration: none;
            font-size: 14px;
        }

    </style>

</head>


<body>

    <div class="login-container">

        <div class="login-card">

            <div class="login-header">

                <span>ADMINISTRATOR</span>

                <h1>Login Admin</h1>

                <p>
                    Masuk untuk mengelola website
                    SMK Negeri 1 Kandeman.
                </p>

            </div>


            <?php if ($error !== '') : ?>

                <div class="error">
                    <?php echo htmlspecialchars($error); ?>
                </div>

            <?php endif; ?>


            <form method="POST">

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Masukkan username"
                        autocomplete="username"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn-login"
                >
                    Login
                </button>

            </form>


            <a
                href="../index.php"
                class="back-home"
            >
                ← Kembali ke website
            </a>

        </div>

    </div>

</body>

</html>