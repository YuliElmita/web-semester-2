<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM yuli_anggota WHERE id = $id");
header("Location: anggota.php");
exit;
?>
