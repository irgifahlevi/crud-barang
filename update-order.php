<?php
if (isset($_POST['update'])) {
    require 'koneksi.php';
    $order_id = $_POST['order_id'];
    $user_id = $_POST['user_id'];
    $barang_id = $_POST['barang_id'];
    $no_invoice = $_POST['no_invoice'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $harga_satuan = $_POST['harga_satuan'];
    $total_harga = $_POST['total_harga'];

    $data = mysqli_query($db, "SELECT * FROM tbl_trx_order WHERE no_invoice='$no_invoice'");
    $cek = mysqli_num_rows($data);

    if ($cek == 0) {

        // $input = "UPDATE tbl_trx_order SET user_id='$user_id', barang_id='$barang_id', no_invoice='$no_invoice', jumlah_pesanan='$jumlah_pesanan', harga_satuan='$harga_satuan', total_harga='$total_harga' WHERE order_id='$order_id'";
        // $result = mysqli_query($db, $input);

        $result = mysqli_query($db, "UPDATE tbl_trx_order SET user_id='$user_id', barang_id='$barang_id', no_invoice='$no_invoice', jumlah_pesanan='$jumlah_pesanan', harga_satuan='$harga_satuan', total_harga='$total_harga' WHERE order_id='$order_id'");

        if ($result) {
            echo "<script>alert('Data Berhasil di Update!')</script>";
            header("Location: master_order.php");
        } else {
            echo "<script>alert('Data Gagal di Update!')</script>";
        }
    } else {
        echo "<script>alert('No Invoice sudah ada cui!')</script>";
        echo ("<script>window.location.assign(window.location.origin + '/VSGA/Pertemuan 7/edit-order.php?order_id=$order_id');</script>");
    }
}
