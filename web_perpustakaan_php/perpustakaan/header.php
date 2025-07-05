<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$base = "/web_perpustakaan_php/perpustakaan";
$email = $_SESSION['nama'] ?? 'Pengguna';
$role  = $_SESSION['role'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background: linear-gradient(135deg, #74ebd5, #9face6);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom navbar-light">
  <div class="container">
    <a class="navbar-brand fw-bold text-dark" href="<?= $base ?>/index.php">📚 Perpustakaan</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a href="<?= $base ?>/index.php" class="nav-link text-dark">Dashboard</a></li>
      <li class="nav-item"><a href="<?= $base ?>/pages/buku.php" class="nav-link text-dark">Buku</a></li>
      <li class="nav-item"><a href="<?= $base ?>/pages/anggota.php" class="nav-link text-dark">Anggota</a></li>
      <li class="nav-item"><a href="<?= $base ?>/pages/peminjaman.php" class="nav-link text-dark">Peminjaman</a></li>

      <!-- Dropdown User -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          👤 <?= htmlspecialchars($email) ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item disabled" href="#">Email: <?= htmlspecialchars($email) ?></a></li>
          <li><a class="dropdown-item disabled" href="#">Role: <?= htmlspecialchars($role) ?></a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="<?= $base ?>/logout.php">🚪 Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Bootstrap JS (untuk dropdown berfungsi) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
