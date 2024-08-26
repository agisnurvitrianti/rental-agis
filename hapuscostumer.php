<?php
include 'koneksi.php';
$id_costumer = $_GET['id'];

$sql = "DELETE FROM data_costumer WHERE id_costumer = '$id_costumer'";
$query = mysqli_query($db_link, $sql);

if ($query) {
    echo '<script>alert("Data costumer berhasil dihapus"); window.location.href = "datacostumer.php";</script>';
} else {
    echo '<script>alert("Gagal menghapus Data costumer"); window.location.href = "datacostumer.php";</script>';
}
?>