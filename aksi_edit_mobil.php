<?php
include 'koneksi.php';

$kd_mobil = $_POST['kd_mobil'];
$merk_mobil = $_POST['merk_mobil'];
$type_mobil = $_POST['type_mobil'];
$id_kategori = $_POST['id_kategori'];
$harga_sewa = $_POST['harga_sewa'];
$foto_lama = $_POST['foto_lama'];

$foto = $foto_lama; // Default to old photo

// Check if a new file is uploaded
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $upload_dir = 'img/'; // Adjust path as necessary
    $tmp_name = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];
    $upload_file = $upload_dir . basename($foto);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($tmp_name, $upload_file)) {
        // Optionally delete the old file if it exists
        if (file_exists($upload_dir . $foto_lama) && $foto_lama !== $foto) {
            unlink($upload_dir . $foto_lama);
        }
    } else {
        echo "File upload failed. Please try again.";
        exit();
    }
}

$sql = "UPDATE data_mobil 
        SET merk_mobil = '$merk_mobil', 
            type_mobil = '$type_mobil', 
            id_kategori = '$id_kategori', 
            harga_sewa = '$harga_sewa', 
            foto = '$foto' 
        WHERE kd_mobil = '$kd_mobil'";

$query = mysqli_query($db_link, $sql);

if ($query) {
    header('Location: datamobil.php');
} else {
    echo "Edit data mobil gagal --> <a href='editmobil.php?id=$kd_mobil'> KEMBALI</a>";
}
?>
