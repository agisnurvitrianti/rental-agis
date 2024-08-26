<?php
include 'koneksi.php';
$id_transaksi = $_GET['id'];

$sql = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
$query = mysqli_query($db_link, $sql);

if ($query) {
    echo '<script>alert("Transaksi berhasil dihapus"); window.location.href = "transaksi.php";</script>';
} else {
    echo '<script>alert("Gagal menghapus transaksi"); window.location.href = "transaksi.php";</script>';
}
?>