<?php
include '../config/koneksi.php'; // naik satu folder karena file ada di /pages

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapus = $koneksi->query("DELETE FROM yuli_peminjaman WHERE id = '$id'");

    if ($hapus) {
        header("Location: peminjaman.php"); // arahkan balik ke halaman list
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
