<?php
require_once("koneksi.php");

$id = $_GET['barang_id'];
$query = "SELECT * FROM tbl_mst_barang WHERE barang_id = $id";
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
                        <h5>Form edit barang</h5>
                    </div>
                    <div class="card-body">
                        <form action="update-barang.php" method="post" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Kode Barang
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input type="text" name="kode_barang" value="<?= $row['kode_barang'] ?>" class="form-control" placeholder="Masukkan kode barang">
                                </div>
                                <div class="col">
                                    <label class="form-label">Nama Barang
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>" class="form-control" placeholder="Masukkan nama barang">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <label class="form-label">Jumlah Stok
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" class="form-control" placeholder="Masukkan jumlah stok">
                                </div>
                                <div class="col">
                                    <label class="form-label">Harga Barang
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input type="number" name="harga" value="<?= $row['harga'] ?>" class="form-control" placeholder="Masukkan harga barang">
                                </div>
                            </div>
                            <input type="hidden" value="<?= $row['barang_id'] ?>" name="barang_id">

                    </div>
                    <div class="modal-footer">
                        <a href="master_barang.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</a>
                        <button type="submit" name="update" value="Update" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
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