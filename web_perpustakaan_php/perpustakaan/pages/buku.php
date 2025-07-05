<?php include '../config/koneksi.php'; include '../header.php'; ?>
<div class="container mt-4">
    <h4>Data Buku</h4>
   <a href="tambah_buku.php" class="btn btn-success mb-3">+ Tambah Buku</a>
   <table class="table table-bordered">
  <tr><th>No</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th><th>Aksi</th></tr>
  <?php
  $no = 1;
  $sql = $koneksi->query("SELECT * FROM yuli_buku");
  while ($row = $sql->fetch_assoc()) {
      echo "<tr>
          <td>$no</td><td>{$row['judul']}</td><td>{$row['penulis']}</td>
          <td>{$row['tahun_terbit']}</td><td>{$row['stok']}</td>
          <td>
              <a href='edit_buku.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
              <a href='hapus_buku.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin?')\">Hapus</a>
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