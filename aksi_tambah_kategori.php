<?php
include "koneksi.php";
$id_kategori=$_POST['id_kategori'];
$kategori=$_POST['kategori'];
$sql="insert into kategori(id_kategori,kategori) 
values('$id_kategori','$kategori')";
$query=mysqli_query($db_link,$sql);
if ($query)
{
header ('location:kategori.php');
}
else
{
echo "Gagal Disimpan --> <a href='tambahkategori.php'> Kembali Ke Input Data";
}
?>

