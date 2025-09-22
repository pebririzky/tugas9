<?php
$host = "localhost"; // server database
$user = "xirpl2-20";      // username MySQL
$pass = "0109630380";          // password MySQL
$db   = "db_xirpl2-20_1"; // nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
