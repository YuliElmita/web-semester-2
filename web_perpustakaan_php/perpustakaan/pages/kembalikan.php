<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$update = $koneksi->query("UPDATE yuli_peminjaman SET status = 'kembali' WHERE id = '$id'");
if ($update) {
    header("Location: peminjaman.php");
} else {
    echo "Gagal mengembalikan!";
}
?>
