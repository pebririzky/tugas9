<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $stok     = (int)$_POST['stok'];
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);

    mysqli_query($koneksi, "INSERT INTO buku (judul, stok, kategori)
                            VALUES ('$judul','$stok','$kategori')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-base-200">
<div class="flex items-center justify-center min-h-screen">
  <div class="card w-full max-w-md bg-base-100 shadow-xl p-6">
    <h2 class="text-2xl font-bold text-primary mb-4">Tambah Buku</h2>
    <form method="post" class="space-y-4">
      <input type="text" name="judul" placeholder="Judul Buku" class="input input-bordered w-full" required>
      <input type="number" name="stok" placeholder="Stok" class="input input-bordered w-full" required>
      <input type="text" name="kategori" placeholder="Kategori" class="input input-bordered w-full" required>
      <button type="submit" name="simpan" class="btn btn-primary w-full">Simpan</button>
    </form>
    <a href="index.php" class="btn btn-link mt-4">← Kembali</a>
  </div>
</div>
</body>
</html>
