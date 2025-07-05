<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM yuli_buku WHERE id = $id");
header("Location: buku.php");
?>
