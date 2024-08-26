<?php
include 'koneksi.php';
$id_transaksi = $_GET['id'];
$sql = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);

$queryCostumer = "SELECT data_costumer.id_costumer, data_costumer.nama_costumer FROM data_costumer";
$resultCostumer = mysqli_query($db_link, $queryCostumer);

$queryMobil = "SELECT data_mobil.kd_mobil, data_mobil.type_mobil FROM data_mobil";
$resultMobil = mysqli_query($db_link, $queryMobil);

$queryKategori = "SELECT kategori.id_kategori, kategori.kategori FROM kategori";
$resultKategori = mysqli_query($db_link, $queryKategori);
?>
<!DOCTYPE html>
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
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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
        input[type="date"],
        select,
        input[type="submit"],
        input[type="button"] {
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
    <h2><center>EDIT DATA TRANSAKSI</center></h2>
    <br>
    <form action='aksi_edit_transaksi.php?id=<?php echo $id_transaksi; ?>' method='POST'>
        <table border="0">
            <tr>
                <td>ID TRANSAKSI</td>
                <td><input name='id_transaksi' type='text' id="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" readonly></td>
            </tr>
            <tr>
                <td>NAMA COSTUMER</td>
                <td>
                    <select name="data_costumer" id="data_costumer">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultCostumer)) {
                            $selected = ($row['id_costumer'] == $data['id_costumer']) ? 'selected' : '';
                            echo "<option value='".$row['id_costumer']."' $selected>".$row['nama_costumer']."</option>";
                        }
                        ?>
                    </select>
                </td>
                
            </tr>
            <tr>
                <td>TYPE MOBIL</td>
                <td>
                    <select name="data_mobil" id="data_mobil">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultMobil)) {
                            $selected = ($row['kd_mobil'] == $data['kd_mobil']) ? 'selected' : '';
                            echo "<option value='".$row['kd_mobil']."' $selected>".$row['type_mobil']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td>
                    <select name="kategori" id="kategori">
                        <?php
                        while ($row = mysqli_fetch_assoc($resultKategori)) {
                            $selected = ($row['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                            echo "<option value='".$row['id_kategori']."' $selected>".$row['kategori']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>TUJUAN SEWA</td>
                <td><input name='tujuan_sewa' type='text' id="tujuan_sewa" value="<?php echo $data['tujuan_sewa']; ?>"></td>
            </tr>
            <tr>
                <td>TANGGAL SEWA</td>
                <td><input name='tgl_sewa' type='date' id="tgl_sewa" value="<?php echo $data['tgl_sewa']; ?>"></td>
            </tr>
            <tr>
                <td>TANGGAL KEMBALI</td>
                <td><input name='tgl_kembali' type='date' id="tgl_kembali" value="<?php echo $data['tgl_kembali']; ?>"></td>
            </tr>
            <tr>
                <td>TOTAL BAYAR</td>
                <td><input name='total_bayar' type='text' id="total_bayar" value="<?php echo $data['total_bayar']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Simpan'>
                    <a href="transaksi.php"><input type='button' value='Batal'></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
