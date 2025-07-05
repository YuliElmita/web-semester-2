<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); 

    $query = "SELECT * FROM yuli_login WHERE username='$user' AND password='$pass'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>🔐 Login Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background-color: #fff;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
<div class="login-card">
    <h3 class="text-center mb-4">🔐 Login Perpustakaan</h3>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100" type="submit">Login</button>
    </form>

    <!-- Tambahan Registrasi -->
    <div class="text-center mt-3">
        <p class="text-muted mb-1">📚 Akses sistem perpustakaan digital</p>
        <a href="register.php" class="btn btn-link">Belum punya akun? Registrasi di sini</a>
    </div>
</div>
</body>
</html>
