<?php
include "koneksi.php";
$id_kategori=$_POST['id_kategori'];
$kategori=$_POST['kategori'];
$sql2 = "UPDATE kategori SET id_kategori = '$id_kategori', kategori = '$kategori' WHERE id_kategori = '$id_kategori'";
$query=mysqli_query($db_link,$sql2);
if ($query)
{
header ('location:kategori.php');
}
else
{
echo "Edit mobil gagal --> <a href='tambahkategori.php'> KEMBALI";
}
?>