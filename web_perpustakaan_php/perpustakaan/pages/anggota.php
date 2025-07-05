<?php include '../config/koneksi.php'; include '../header.php'; ?>
<div class="container mt-4">
    <h4>Data Anggota</h4>
    <a href="tambah_anggota.php" class="btn btn-success mb-3">+ Tambah Anggota</a>
    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM yuli_anggota");
        while ($row = $sql->fetch_assoc()) {
            echo "<tr>
                <td>$no</td>
                <td>{$row['nama']}</td>
                <td>{$row['email']}</td>
                <td><code style='font-size: 0.75em'>{$row['password']}</code></td>
                <td>{$row['role']}</td>
                <td>
                    <a href='edit_anggota.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_anggota.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus anggota ini?')\">Hapus</a>
                </td>
              </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>
<footer class="text-center py-3 bg-light text-primary shadow-sm mt-5">
    © 2025 Perpustakaan Yuli Elmita. All rights reserved.
</footer>

<?php include '../footer.php'; ?>
