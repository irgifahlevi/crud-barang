<?php
require_once "koneksi.php";




?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-10">
                <h2 class="text-center">Data Barang</h2>
                <div class="mb-3 mt-2">
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data+</a>
                    <a href="welcome.php" type="button" class="btn btn-warning">Kembali</a>
                </div>
                <div class="col-md-15">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Barang ID</th>
                                        <th scope="col">Kode Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah Stok</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($db, 'select * from tbl_mst_barang');
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $data['barang_id']; ?></td>
                                            <td><?= $data['kode_barang']; ?></td>
                                            <td><?= $data['nama_barang']; ?></td>
                                            <td><?= $data['jumlah']; ?></td>
                                            <td><?= $data['harga']; ?></td>
                                            <td>
                                                <a href="hapus.php?barang_id=<?= $data['barang_id'] ?>" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Lu yakin?')">Hapus Data</a>
                                                <a href="edit-barang.php?barang_id=<?= $data['barang_id'] ?>" type="button" class="btn btn-sm btn-warning">Edit Data</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">


                            <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            require 'koneksi.php';

                            if (isset($_POST['submit'])) {
                                $kode_barang = $_POST['kode_barang'];
                                $nama_barang = $_POST['nama_barang'];
                                $jumlah = $_POST['jumlah'];
                                $harga = $_POST['harga'];

                                $input = "insert into tbl_mst_barang VALUES ('','$kode_barang','$nama_barang','$jumlah', '$harga')";
                                $query = mysqli_query($db, $input);
                                echo "<script>alert('Data Berhasil di Tambahkan!')</script>";
                                echo "<meta http-equiv='refresh' content='1' />";
                            }

                            ?>

                            <form action="master_barang.php" method="post" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Kode Barang
                                            <span class="text-danger">* </span>
                                        </label>
                                        <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan kode barang">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Nama Barang
                                            <span class="text-danger">* </span>
                                        </label>
                                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang">
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <label class="form-label">Jumlah Stok
                                            <span class="text-danger">* </span>
                                        </label>
                                        <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah stok">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Harga Barang
                                            <span class="text-danger">* </span>
                                        </label>
                                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga barang">
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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