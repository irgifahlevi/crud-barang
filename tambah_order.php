<?php
require_once("koneksi.php");

//cek button    
if (isset($_POST['submit'])) {
    $noInvoice = $_POST['no_invoice'];
    $result = mysqli_query($db, "select * from tbl_trx_order where no_invoice='$noInvoice'");
    $data = mysqli_fetch_array($result);

    // $order_id            = $_POST['order_id'];
    $user_id       = $_POST['user_id'];
    $barang_id           = $_POST['barang_id'];
    $no_invoice      = $_POST['no_invoice'];
    $jumlah_pesanan     = $_POST['jumlah_pesanan'];
    $harga_satuan      = $_POST['harga_satuan'];
    $total_harga      = $_POST['total_harga'];
    if ($no_invoice == $data['no_invoice']) {
        echo "<script>alert('Data Invoice Sama. Gagal disimpan')</script>";
    } else {
        $input    = "INSERT INTO tbl_trx_order VALUES ('','$user_id','$barang_id','$no_invoice','$jumlah_pesanan', '$harga_satuan','$total_harga')";
        $query_input = mysqli_query($db, $input);
        echo "<script>alert('Data Berhasil Di Tambahkan')</script>";
        header("Location: master_order.php");
    }
}

// $sql = "INSERT INTO tbl_mst_user VALUES ('','$nama_anggota', '$user_name_login', '$password')";

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form Registrasi</title>
</head>

<body>
    <!-- <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Input Orderan</h5>

                                </div>

                                <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col">
                                            <label for="yourUsername" class="form-label">User ID</label>
                                            <select class="form-select" aria-label="Default select example" name="user_id">
                                                <option selected>Open this select menu</option>
                                                <?php
                                                include "koneksi.php";
                                                $query = mysqli_query($db, "SELECT * FROM tbl_mst_user") or die(mysqli_error($db));

                                                while ($data = mysqli_fetch_array($query)) { ?>
                                                    <option value="<?php echo $data['user_id'] ?>"><?php echo  $data['nama_anggota'] ?> </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="yourUsername" class="form-label">Barang ID</label>
                                            <select class="form-select" aria-label="Default select example" name="barang_id">
                                                <option selected>Open this select menu</option>
                                                <?php
                                                include "koneksi.php";
                                                $query = mysqli_query($db, "SELECT * FROM tbl_mst_barang") or die(mysqli_error($db));

                                                while ($data = mysqli_fetch_array($query)) { ?>
                                                    <option value="<?php echo $data['barang_id'] ?>"><?php echo  $data['kode_barang'] ?> </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="yourUsername" class="form-label">No Invoice</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="no_invoice" value="INV" class="form-control" id="yourUsername" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="yourUsername" class="form-label">Jumlah Pesanan</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="jumlah_pesanan" class="form-control" id="txt1" onkeyup="sum();" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="yourUsername" class="form-label">Harga Satuan</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="harga_satuan" class="form-control" id="txt2" onkeyup="sum();" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="yourUsername" class="form-label">Total Harga</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="total_harga" value="0" class="form-control" id="txt4" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" name="submit">Tambah</button>
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


    </div> -->

    <div class="container mt-6">
        <div class="row justify-content-center">
            <div class="col-7 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Form tambah orederan</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">User ID</label>
                                        <select class="form-select" aria-label="Default select example" name="user_id">
                                            <option selected>Pilih User</option>
                                            <?php
                                            include "koneksi.php";
                                            $query = mysqli_query($db, "SELECT * FROM tbl_mst_user") or die(mysqli_error($db));

                                            while ($data = mysqli_fetch_array($query)) { ?>
                                                <option value="<?php echo $data['user_id'] ?>"><?php echo  $data['nama_anggota'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Barang ID</label>
                                        <select class="form-select" aria-label="Default select example" name="barang_id">
                                            <option selected>Masukkan Kode Barang</option>
                                            <?php
                                            include "koneksi.php";
                                            $query = mysqli_query($db, "SELECT * FROM tbl_mst_barang") or die(mysqli_error($db));

                                            while ($data = mysqli_fetch_array($query)) { ?>
                                                <option value="<?php echo $data['barang_id'] ?>"><?php echo  $data['kode_barang'] ?> </option>
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
                                        <input type="text" name="no_invoice" value="INV" class="form-control" id="yourUsername" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="yourUsername" class="form-label">Jumlah Pesanan</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="jumlah_pesanan" class="form-control" id="txt1" onkeyup="sum();" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="yourUsername" class="form-label">Harga Satuan</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="harga_satuan" class="form-control" id="txt2" onkeyup="sum();" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="yourUsername" class="form-label">Total Harga</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="total_harga" value="0" class="form-control" id="txt4" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
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