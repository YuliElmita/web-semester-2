<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "db_perpustakaan";

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
