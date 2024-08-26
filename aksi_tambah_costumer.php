<?php
include "koneksi.php";
$id_costumer=$_POST['id_costumer'];
$nama_costumer=$_POST['nama_costumer'];
$alamat_costumer=$_POST['alamat_costumer'];
$no_hp=$_POST['no_hp'];
$sql="insert into data_costumer(id_costumer,nama_costumer,alamat_costumer,no_hp) 
values('$id_costumer','$nama_costumer','$alamat_costumer','$no_hp')";
$query=mysqli_query($db_link,$sql);
if ($query)
{
header ('location:datacostumer.php');
}
else
{
echo "Gagal Disimpan --> <a href='tambahcostumer.php'> Kembali Ke Input Data";
}
?>

