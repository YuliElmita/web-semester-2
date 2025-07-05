<?php include '../config/koneksi.php'; include '../header.php'; ?>
<div class="container mt-4">
    <h4>Data Peminjaman</h4>
    <a href="tambah_peminjaman.php" class="btn btn-success mb-3">+ Tambah Peminjaman</a>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th> <!-- Kolom aksi -->
        </tr>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT p.*, a.nama AS anggota, b.judul AS buku FROM yuli_peminjaman p
                                JOIN yuli_anggota a ON p.anggota_id = a.id
                                JOIN yuli_buku b ON p.buku_id = b.id");
        while ($row = $sql->fetch_assoc()) {
            echo "<tr>
                <td>$no</td>
                <td>{$row['anggota']}</td>
                <td>{$row['buku']}</td>
                <td>{$row['tanggal_peminjaman']}</td>
                <td>{$row['tanggal_kembalian']}</td>
                <td>{$row['status']}</td>
                <td>";
                // Jika status masih pinjam, tampilkan tombol kembalikan
                if ($row['status'] == 'pinjam') {
                    echo "<a href='kembalikan.php?id={$row['id']}' class='btn btn-sm btn-primary'>Kembalikan</a> ";
                }
                echo "<a href='hapus_peminjaman.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>
<footer class="text-center py-3 bg-light text-primary shadow-sm mt-5">
    © 2025 Perpustakaan Yuli Elmita. All rights reserved.
</footer>
<?php include '../footer.php'; ?>
