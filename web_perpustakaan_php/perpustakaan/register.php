<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // MD5 untuk password yang disimpan dalam format MD5
    $role = $_POST['role'];

    // Cek apakah username sudah ada
    $cek = $koneksi->query("SELECT * FROM yuli_login WHERE username='$user'");
    if ($cek->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $sql = "INSERT INTO yuli_login (username, password, role) VALUES ('$user', '$pass', '$role')";
        if ($koneksi->query($sql)) {
            echo "<script>alert('Registrasi berhasil!');window.location='login.php';</script>";
        } else {
            $error = "Registrasi gagal: " . $koneksi->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-card {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="register-card">
    <h4 class="text-center mb-3">📝 Registrasi Akun</h4>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <select name="role" class="form-control mb-3" required>
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="pengunjung">Pengunjung</option>
        </select>
        <button type="submit" class="btn btn-primary w-100">Daftar</button>
        <a href="login.php" class="btn btn-link w-100 mt-2">Sudah punya akun? Login</a>
    </form>
</div>
</body>
</html>