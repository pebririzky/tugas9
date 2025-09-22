<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
$buku = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $stok     = (int)$_POST['stok'];
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);

    mysqli_query($koneksi, "UPDATE buku SET judul='$judul', stok='$stok', kategori='$kategori'
                            WHERE id_buku=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-base-200">
<div class="flex items-center justify-center min-h-screen">
  <div class="card w-full max-w-md bg-base-100 shadow-xl p-6">
    <h2 class="text-2xl font-bold text-primary mb-4">Ubah Buku</h2>
    <form method="post" class="space-y-4">
      <input type="text" name="judul" value="<?= htmlspecialchars($buku['judul']); ?>" class="input input-bordered w-full" required>
      <input type="number" name="stok" value="<?= $buku['stok']; ?>" class="input input-bordered w-full" required>
      <input type="text" name="kategori" value="<?= htmlspecialchars($buku['kategori']); ?>" class="input input-bordered w-full" required>
      <button type="submit" name="update" class="btn btn-warning w-full">Update</button>
    </form>
    <a href="index.php" class="btn btn-link mt-4">← Kembali</a>
  </div>
</div>
</body>
</html>
