<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-base-200 min-h-screen">
<div class="container mx-auto p-6">
  <div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-primary">📚 Data Buku</h1>
    <p class="text-gray-500">CRUD PHP + MySQL dengan Tailwind & DaisyUI</p>
  </div>

  <div class="flex justify-end mb-4">
    <a href="tambah.php" class="btn btn-primary">+ Tambah Buku</a>
  </div>

  <div class="overflow-x-auto shadow-lg rounded-lg">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Stok</th>
          <th>Kategori</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
          <td><?= $row['id_buku']; ?></td>
          <td><?= htmlspecialchars($row['judul']); ?></td>
          <td><?= $row['stok']; ?></td>
          <td><?= htmlspecialchars($row['kategori']); ?></td>
          <td class="text-center space-x-2">
            <a href="ubah.php?id=<?= $row['id_buku']; ?>" class="btn btn-warning btn-sm">Ubah</a>
            <a href="hapus.php?id=<?= $row['id_buku']; ?>" 
               onclick="return confirm('Yakin ingin menghapus?')" 
               class="btn btn-error btn-sm">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
