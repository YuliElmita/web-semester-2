<?php
include '../config/koneksi.php';
include '../header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anggota_id = $_POST['anggota_id'];
    $buku_id = $_POST['buku_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_kembalian = $_POST['tanggal_kembalian'];
    $status = $_POST['status'];

    $sql = "INSERT INTO yuli_peminjaman (anggota_id, buku_id, tanggal_peminjaman, tanggal_kembalian, status)
            VALUES ('$anggota_id', '$buku_id', '$tanggal_peminjaman', '$tanggal_kembalian', '$status')";
    if ($koneksi->query($sql)) {
        header("Location: peminjaman.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan peminjaman!</div>";
    }
}
?>

<div class="container mt-4">
    <h4>Tambah Peminjaman</h4>
    <form method="post">
        <select name="anggota_id" class="form-control mb-2" required>
            <option value="">Pilih Anggota</option>
            <?php
            $anggota = $koneksi->query("SELECT * FROM yuli_anggota");
            while ($a = $anggota->fetch_assoc()) {
                echo "<option value='{$a['id']}'>{$a['nama']}</option>";
            }
            ?>
        </select>
        <select name="buku_id" class="form-control mb-2" required>
            <option value="">Pilih Buku</option>
            <?php
            $buku = $koneksi->query("SELECT * FROM yuli_buku");
            while ($b = $buku->fetch_assoc()) {
                echo "<option value='{$b['id']}'>{$b['judul']}</option>";
            }
            ?>
        </select>
        <input type="date" name="tanggal_peminjaman" class="form-control mb-2" required>
        <input type="date" name="tanggal_kembalian" class="form-control mb-2">
        <select name="status" class="form-control mb-3" required>
            <option value="">Pilih Status</option>
            <option value="pinjam">Pinjam</option>
            <option value="kembali">Kembali</option>
        </select>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="peminjaman.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../footer.php'; ?>
