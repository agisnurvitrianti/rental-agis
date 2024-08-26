<?php
include 'koneksi.php';
$queryCostumer= "SELECT data_costumer.id_costumer, data_costumer.nama_costumer FROM data_costumer";
$resultCostumer = mysqli_query($db_link,$queryCostumer);

$queryMobil = "SELECT data_mobil.kd_mobil, data_mobil.type_mobil FROM data_mobil";
$resultMobil = mysqli_query($db_link,$queryMobil);

$queryKategori = "SELECT kategori.id_kategori, kategori.kategori FROM kategori";
$resultKategori = mysqli_query($db_link,$queryKategori);
?>
<DOCTYPE html>
<html>
<head>
    <style>
    html, body {
    min-height: 100%;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: #F4EEFF;
    background: linear-gradient(-135deg, #A6B1E1, #F4EEFF);
    background-size: cover;
}

   h2 {
        color: #333; 
        text-align: center; 
        margin-top: 20px; 
        font-size: 36px; 
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);"
       
    }

    form {
        width: 50%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
    }

    td {
        padding: 10px;
    }

    input[type="text"],
    input[type="file"],
    input[type="submit"],
    input[type="button"],
    input[type="date"],
        select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 5px;
    }

    input[type="submit"] {
        background-color: #BE9FE1;
        color: white;
        border: none;
        cursor: pointer;
        
    }
	
    input[type="button"] {
        background-color: #424874;
        color: white;
        border: none;
        cursor: pointer;
        
    }

    input[type="submit"]:hover {
        background-color: #BE9FE1;
 transform: scale(1.1);
    }
	
    input[type="button"]:hover {
        background-color: #424874;
 transform: scale(1.1);
    }

    a {
        text-decoration: none;
        color: #333;
    }

    center {
        display: block;
        text-align: center;
    }
</style>

</head>
<body>
<h2><center>TAMBAH DATA TRANSAKSI</h2></center>
<br>
<form action='aksi_tambah_transaksi.php' method='POST'>
    <table border="0">
        <tr>
            <td>ID TRANSAKSI</td>
            <td><input type="text" name="id_transaksi" id="id_transaksi"></td>
        </tr>
        <tr>
            <td>NAMA COSTUMER</td>
            <td><label>
                    <select name="data_costumer" id="data_costumer" size="1">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultCostumer)) {
                            echo "<option value='" . $row['id_costumer'] . "'>" . $row['nama_costumer'] . "</option>";
                        }
                        mysqli_free_result($resultCostumer);
                        ?>
                    </select>
                </label></td>
        </tr>
        <tr>
            <td>TYPE MOBIL</td>
          <td><label>
                    <select name="data_mobil" id="data_mobil" size="1">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultMobil)) {
                            echo "<option value='" . $row['kd_mobil'] . "'>" . $row['type_mobil'] . "</option>";
                        }
                        mysqli_free_result($resultMobil);
                        ?>
                    </select>
                </label></td>
        </tr>
                <tr>
            <td>KATEGORI</td>
            <td><label>
                    <select name="kategori" id="kategori" size="1">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultKategori)) {
                            echo "<option value='" . $row['id_kategori'] . "'>" . $row['kategori'] . "</option>";
                        }
                        mysqli_free_result($resultKategori);
                        ?>
                    </select>
                </label></td>
        </tr>
         <tr>
            <td>TUJUAN SEWA</td>
            <td><input type="text" name="tujuan_sewa" id="tujuan_sewa"</td>
        </tr>
         <tr>
            <td>TANGGAL SEWA</td>
            <td><input type="date" name="tgl_sewa" id="tgl_sewa"</td>
        </tr>
         <tr>
            <td>TANGGAL KEMBALI</td>
            <td><input type="date" name="tgl_kembali" id="tgl_kembali"</td>
        </tr>
         <tr>
            <td>TOTAL BAYAR</td>
            <td><input type="text" name="total_bayar" id="total_bayar"</td>
        </tr>
                <tr>
             <td></td>
            <td>
                <input type='submit' value='simpan'>
                <a href="transaksi.php"> <input type='button' value='batal'>
                </td>
        </tr>
    </table>
</form>
</body></html>