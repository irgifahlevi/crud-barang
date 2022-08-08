<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
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
                                    while ($data = mysqli_fetch_array($result)) {
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
                                                <a href="hapus-order.php?order_id=<?= $data['order_id'] ?>" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Lu yakin?')">Hapus Data</a>
                                                <a href="edit-order.php?order_id=<?= $data['order_id'] ?>" type="button" class="btn btn-sm btn-warning">Edit Data</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>