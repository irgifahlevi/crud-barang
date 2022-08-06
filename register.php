<?php
require_once("koneksi.php");
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    // $user_id = $_POST['user_id'];
    $nama_anggota = $_POST['nama_anggota'];
    $user_name_login = md5($_POST['user_name_login']);
    $password = md5($_POST['password']);
}

if ($password) {
    $sql = "SELECT * FROM tbl_mst_user WHERE nama_anggota='$nama_anggota'";
    $result = mysqli_query($db, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO tbl_mst_user VALUES ('','$nama_anggota', '$user_name_login', '$password')";
        // $sql = "INSERT INTO tbl_mst_user VALUES ('$user_id', '$nama_anggota', '$user_name_login', '$password')";
        $result = mysqli_query($db, $sql);
        if ($result) {
            // $user_id = "";
            $nama_anggota = "";
            $_POST['user_name_login'] = "";
            $_POST['password'] = "";
            echo "<script>alert('Registrasi Berhasil!')
            location.href = 'login.php';
            </script>";
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Nama sudah terdaftar.')</script>";
    }
}
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
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                                    <!-- <div class="col-12">
                                        <label for="yourName" class="form-label">User ID</label>
                                        <input type="text" name="user_id" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please, enter User ID!</div>
                                    </div> -->
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Nama Anggota</label>
                                        <input type="text" name="nama_anggota" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please, enter Nama Anggota!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username Login</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="user_name_login" class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" name="submit">Register</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="login.php">Log
                                                in</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>