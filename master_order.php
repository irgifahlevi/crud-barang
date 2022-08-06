<?php
require_once "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>
    <!-- <div class="container">
        <div class="col mt-3">
            <a href="tambah_order.php" class="btn btn-primary">Tambah</a>

            <a href="welcome.php" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="col-md-5">
            <table class="table table-striped mt-2">
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Barang ID</th>
                    <th>NO Invoice</th>
                    <th>Jumlah Pesanan</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                </tr>
                <?php
                $result = mysqli_query($db, "SELECT * FROM tbl_trx_order");

                // $result = mysqli_query($db, "SELECT tbl_mst_user.user_id, tbl_mst_user.nama_anggota, 
                // tbl_mst_barang.barang_id, tbl_mst_barang.harga, 
                // tbl_trx_order.user_id, tbl_trx_order.barang_id, 
                // FROM tbl_mst_user
                // INNER JOIN  tbl_mst_barang ON tbl_mst_user.user_id =  tbl_mst_barang.barang_id 
                // INNER JOIN  tbl_trx_order ON tbl_mst_user.barang_id  = tbl_trx_order.user_id");


                while ($data = mysqli_fetch_array($result)) {
                    // foreach (mysqli_fetch_array($result) as $data) {
                ?>
                    <tr>
                        <td><?= $data['order_id']; ?></td>
                        <td><?= $data['user_id']; ?></td>
                        <td><?= $data['barang_id']; ?></td>
                        <td><?= $data['no_invoice']; ?></td>
                        <td><?= $data['jumlah_pesanan']; ?></td>
                        <td><?= $data['harga_satuan']; ?></td>
                        <td><?= $data['total_harga']; ?></td>

                    </tr>
                <?php } ?>


            </table>
        </div>
    </div> -->

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <h2 class="text-center">Data Order</h2>
                <div class="mb-3 mt-2">
                    <a href="tambah_order.php" type="button" class="btn btn-primary">Tambah Data+</a>
                    <a href="welcome.php" type="button" class="btn btn-warning">Kembali</a>
                </div>
                <div class="col-md-15">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Barang ID</th>
                                        <th scope="col">NO Invoice</th>
                                        <th scope="col">Jumlah Pesanan</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($db, "SELECT * FROM tbl_trx_order");

                                    // $result = mysqli_query($db, "SELECT tbl_mst_user.user_id, tbl_mst_user.nama_anggota, 
                                    // tbl_mst_barang.barang_id, tbl_mst_barang.harga, 
                                    // tbl_trx_order.user_id, tbl_trx_order.barang_id, 
                                    // FROM tbl_mst_user
                                    // INNER JOIN  tbl_mst_barang ON tbl_mst_user.user_id =  tbl_mst_barang.barang_id 
                                    // INNER JOIN  tbl_trx_order ON tbl_mst_user.barang_id  = tbl_trx_order.user_id");


                                    while ($data = mysqli_fetch_array($result)) {
                                        // foreach (mysqli_fetch_array($result) as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $data['order_id']; ?></td>
                                            <td><?= $data['user_id']; ?></td>
                                            <td><?= $data['barang_id']; ?></td>
                                            <td><?= $data['no_invoice']; ?></td>
                                            <td><?= $data['jumlah_pesanan']; ?></td>
                                            <td><?= $data['harga_satuan']; ?></td>
                                            <td><?= $data['total_harga']; ?></td>
                                            <td>
                                                <a href="hapus.php?barang_id=<?= $data['barang_id'] ?>" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Lu yakin?')">Hapus Data</a>
                                                <a href="" type="button" class="btn btn-sm btn-warning">Edit Data</a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>