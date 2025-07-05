<?php
include '../config/koneksi.php';
include '../header.php';

$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM yuli_buku WHERE id = $id");
$data = $sql->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    $update = "UPDATE yuli_buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun', stok='$stok' WHERE id=$id";
    if ($koneksi->query($update)) {
        header("Location: buku.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengedit buku!</div>";
    }
}
?>

<div class="container mt-4">
    <h4>Edit Buku</h4>
    <form method="post">
        <input type="text" name="judul" class="form-control mb-2" value="<?= $data['judul'] ?>" required>
        <input type="text" name="penulis" class="form-control mb-2" value="<?= $data['penulis'] ?>" required>
        <input type="number" name="tahun" class="form-control mb-2" value="<?= $data['tahun_terbit'] ?>" required>
        <input type="number" name="stok" class="form-control mb-2" value="<?= $data['stok'] ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="buku.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../footer.php'; ?>
