<?php
include "koneksi.php";
$kd_mobil=$_POST['kd_mobil'];
$merk_mobil=$_POST['merk_mobil'];
$type_mobil=$_POST['type_mobil'];
$id_kategori=$_POST['kategori'];
$harga_sewa=$_POST['harga_sewa'];
$foto=$_POST['foto'];
$sql="insert into data_mobil(kd_mobil,merk_mobil,type_mobil,id_kategori,harga_sewa,foto) 
values('$kd_mobil','$merk_mobil','$type_mobil','$id_kategori','$harga_sewa','$foto')";
$query = mysqli_query($db_link, $sql);

if ($query) {
    header('Location: datamobil.php');
    exit();
    
} else {
    echo "Gagal Disimpan --> <a href='tambahmobil.php'> Kembali Ke Input Data</a>";
}
?>
