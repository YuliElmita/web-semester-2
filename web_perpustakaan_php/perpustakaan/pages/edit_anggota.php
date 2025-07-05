<?php
include '../config/koneksi.php';
include '../header.php';

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM yuli_anggota WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE yuli_anggota SET nama='$nama', email='$email', role='$role' WHERE id=$id";
    if ($koneksi->query($sql)) {
        header("Location: anggota.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengedit anggota!</div>";
    }
}
?>

<div class="container mt-4">
    <h4>Edit Anggota</h4>
    <form method="post">
        <input type="text" name="nama" class="form-control mb-2" value="<?= $data['nama'] ?>" required>
        <input type="email" name="email" class="form-control mb-2" value="<?= $data['email'] ?>" required>
        <select name="role" class="form-control mb-3" required>
            <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="pengunjung" <?= $data['role'] == 'pengunjung' ? 'selected' : '' ?>>Pengunjung</option>
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="anggota.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../footer.php'; ?>
