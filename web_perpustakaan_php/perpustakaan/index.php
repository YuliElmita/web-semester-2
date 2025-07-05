<?php
// Mulai session dan proteksi akses login
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'config/koneksi.php'; // koneksi ke database
include 'header.php';         // tampilan navbar

// Ambil data dari database
$total_buku = $koneksi->query("SELECT COUNT(*) FROM yuli_buku")->fetch_row()[0];
$total_anggota = $koneksi->query("SELECT COUNT(*) FROM yuli_anggota")->fetch_row()[0];
$total_pinjam = $koneksi->query("SELECT COUNT(*) FROM yuli_peminjaman WHERE status='pinjam'")->fetch_row()[0];
?>

<div class="container mt-5">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-primary">📚 Selamat Datang di Dunia Literasi Digital!</h1>
            <p class="col-md-8 fs-5">Jelajahi ribuan buku, kelola peminjaman, dan perluas wawasanmu tanpa batas. Selamat datang di sistem perpustakaan digital Yuli Elmita.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg me-2" href="pages/buku.php">Lihat Buku</a>
            <a class="btn btn-outline-secondary btn-lg me-2" href="pages/anggota.php">Lihat Anggota</a>
            <a class="btn btn-outline-secondary btn-lg" href="pages/peminjaman.php">Lihat Peminjaman</a>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="card-text fs-4">📘 <?= $total_buku; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Anggota</h5>
                    <p class="card-text fs-4">👤 <?= $total_anggota; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Peminjaman Aktif</h5>
                    <p class="card-text fs-4">📖 <?= $total_pinjam; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-3 bg-light text-primary shadow-sm mt-5">
    © 2025 Perpustakaan Yuli Elmita. All rights reserved.
</footer>
<?php include 'footer.php'; ?>