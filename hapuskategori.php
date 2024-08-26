<?php
include 'koneksi.php';
$id_kategori = $_GET['id'];

$sql = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
$query = mysqli_query($db_link, $sql);

if ($query) {
    echo '<script>alert("Kategori berhasil dihapus"); window.location.href = "kategori.php";</script>';
} else {
    echo '<script>alert("Gagal menghapus kategori"); window.location.href = "kategori.php";</script>';
}
?>