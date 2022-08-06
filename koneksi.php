<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_evaluasi_pert7";
$db = mysqli_connect($server, $user, $password, $nama_database);
// echo "berhasil terkoneksi..... ";
if (!$db) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
