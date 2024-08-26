<?php
include 'koneksi.php';
$id_transaksi = $_POST['id_transaksi'];
$id_costumer = $_POST['data_costumer'];
$kd_mobil = $_POST['data_mobil'];
$id_kategori = $_POST['kategori'];
$tujuan_sewa = $_POST['tujuan_sewa'];
$tgl_sewa = $_POST['tgl_sewa'];
$tgl_kembali = $_POST['tgl_kembali'];
$total_bayar = $_POST['total_bayar'];

$sql = "INSERT INTO transaksi (id_transaksi, id_costumer, kd_mobil, id_kategori, tujuan_sewa, tgl_sewa, tgl_kembali, total_bayar) 
        VALUES ('$id_transaksi', '$id_costumer', '$kd_mobil', '$id_kategori', '$tujuan_sewa', '$tgl_sewa', '$tgl_kembali', '$total_bayar')";

$query = mysqli_query($db_link, $sql);
if ($query) {
    header('Location: transaksi.php');
    exit();
} else {
    echo "Data gagal disimpan: " . mysqli_error($db_link);
    echo "<br><a href='tambahtransaksi.php'>Kembali ke input data</a>";
}
?>
