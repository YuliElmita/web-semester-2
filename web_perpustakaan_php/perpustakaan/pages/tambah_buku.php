<?php
include '../config/koneksi.php';
include '../header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO yuli_buku (judul, penulis, tahun_terbit, stok) 
            VALUES ('$judul', '$penulis', '$tahun', '$stok')";
    if ($koneksi->query($sql)) {
        header("Location: buku.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan buku!</div>";
    }
}
?>

<div class="container mt-4">
    <h4>Tambah Buku</h4>
    <form method="post">
        <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
        <input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis" required>
        <input type="number" name="tahun" class="form-control mb-2" placeholder="Tahun Terbit" required>
        <input type="number" name="stok" class="form-control mb-2" placeholder="Stok" required>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="buku.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../footer.php'; ?>