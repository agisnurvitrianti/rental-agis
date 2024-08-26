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

$sql = "UPDATE transaksi SET 
    id_costumer = '$id_costumer', 
    kd_mobil = '$kd_mobil', 
    id_kategori = '$id_kategori', 
    tujuan_sewa = '$tujuan_sewa', 
    tgl_sewa = '$tgl_sewa', 
    tgl_kembali = '$tgl_kembali', 
    total_bayar = '$total_bayar'
    WHERE id_transaksi = '$id_transaksi'";

$query = mysqli_query($db_link, $sql);

if ($query) {
    header('Location: transaksi.php');

} else {
    echo "Gagal Disimpan --> <a href='tambahtransaksi.php'> Kembali Ke Input Data</a>";
}
?>
