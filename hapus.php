
<?php
include 'koneksi.php';
$id = $_GET['barang_id'];
$pdo = mysqli_query($db, "SET FOREIGN_KEY_CHECKS=0");
$query = mysqli_query($db, "DELETE FROM tbl_mst_barang WHERE barang_id='$id'", $pdo) or die(mysqli_error($db));
echo "<script>alert('Data Berhasil di Hapus!');
document.location.href = 'master_barang.php';
</script>";
// header("Location:master_barang.php");
?>