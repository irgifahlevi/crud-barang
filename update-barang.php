<?php
if (isset($_POST['update'])) {
    require 'koneksi.php';
    $id = $_POST['barang_id'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $input = "UPDATE tbl_mst_barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', jumlah='$jumlah', harga='$harga' where barang_id='$id'";
    $result = mysqli_query($db, $input);
    if ($result) {
        echo "<script>alert('Data Berhasil di Update!')</script>";
        header("Location: master_barang.php");
    } else {
        echo "<script>alert('Data Gagal di Update!')</script>";
    }
}
