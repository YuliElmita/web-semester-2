<?php
include '../config/koneksi.php';
include '../header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO yuli_anggota (nama, email, password, role)
            VALUES ('$nama', '$email', '$password', '$role')";
    if ($koneksi->query($sql)) {
        header("Location: anggota.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan anggota!</div>";
    }
}
?>

<div class="container mt-4">
    <h4>Tambah Anggota</h4>
    <form method="post">
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <select name="role" class="form-control mb-3" required>
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="user">pengunjug</option>
        </select>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="anggota.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../footer.php'; ?>
