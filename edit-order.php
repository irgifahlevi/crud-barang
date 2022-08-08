<?php
require_once("koneksi.php");

$id = $_GET['order_id'];
$query = "SELECT * FROM tbl_trx_order WHERE order_id = $id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-6">
        <div class="row justify-content-center">
            <div class="col-7 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Form tambah orederan</h5>
                    </div>
                    <div class="card-body">
                        <form action="update-order.php" method="POST">
                            <div class="row">
                                <input type="hidden" value="<?= $row['order_id'] ?>" name="order_id">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">User ID</label>
                                        <select class="form-select" aria-label="Default select example" name="user_id">
                                            <option selected><?= $row['user_id'] ?></option>
                                            <?php
                                            include "koneksi.php";
                                            $query = mysqli_query($db, "SELECT * FROM tbl_mst_user") or die(mysqli_error($db));
                                            while ($data = mysqli_fetch_array($query)) { ?>
                                                <option value="<?php echo $data['user_id'] ?>"><?php echo  $data['user_id'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Barang ID</label>
                                        <select class="form-select" aria-label="Default select example" name="barang_id">
                                            <option selected><?= $row['barang_id'] ?></option>
                                            <?php
                                            include "koneksi.php";
                                            $query = mysqli_query($db, "SELECT * FROM tbl_mst_barang") or die(mysqli_error($db));

                                            while ($data = mysqli_fetch_array($query)) { ?>
                                                <option value="<?php echo $data['barang_id'] ?>"><?php echo  $data['barang_id'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="yourUsername" class="form-label">No Invoice</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="no_invoice" value="<?= $row['no_invoice'] ?>" class="form-control" id="yourUsername" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="yourUsername" class="form-label">Jumlah Pesanan</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="jumlah_pesanan" value="<?= $row['jumlah_pesanan'] ?>" class="form-control" id="txt1" onkeyup="sum();" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="yourUsername" class="form-label">Harga Satuan</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="harga_satuan" value="<?= $row['harga_satuan'] ?>" class="form-control" id="txt2" onkeyup="sum();" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="yourUsername" class="form-label">Total Harga</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="total_harga" value="<?= $row['total_harga'] ?>" value="0" class="form-control" id="txt4" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" name="update" value="Update" class="btn btn-primary">Simpan</button>
                                <a href="master_order.php" type="button" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                        <script>
                            function sum() {
                                var txtFirstNumberValue = document.getElementById('txt1').value;
                                var txtSecondNumberValue = document.getElementById('txt2').value;
                                var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
                                if (!isNaN(result)) {
                                    document.getElementById('txt4').value = result;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>