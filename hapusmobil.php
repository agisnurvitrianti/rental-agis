<?php
include 'koneksi.php';

$kd_mobil = $_GET['id'];

$sql = "DELETE FROM data_mobil WHERE kd_mobil = '$kd_mobil'";
$query = mysqli_query($db_link, $sql);

if ($query) {
    echo '<script>alert("Data mobil berhasil dihapus"); window.location.href = "datamobil.php";</script>';
} else {
    echo '<script>alert("Gagal menghapus Data mobil"); window.location.href = "datamobil.php";</script>';
}
?>
