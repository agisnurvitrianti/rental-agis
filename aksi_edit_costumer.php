<?php
include "koneksi.php";
$id_costumer=$_POST['id_costumer'];
$nama_costumer=$_POST['nama_costumer'];
$alamat_costumer=$_POST['alamat_costumer'];
$no_hp=$_POST['no_hp'];
$sql2 = "UPDATE data_costumer SET id_costumer = '$id_costumer', nama_costumer = '$nama_costumer', alamat_costumer = '$alamat_costumer', no_hp = '$no_hp' WHERE id_costumer = '$id_costumer'";
$query=mysqli_query($db_link,$sql2);
if ($query)
{
header ('location:datacostumer.php');
}
else
{
echo "Edit data costumer gagal --> <a href='tambahcostumer.php'> KEMBALI";
}
?>