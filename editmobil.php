<?php
include 'koneksi.php';

$kd_mobil = $_GET['id'];
$sql = "SELECT * FROM data_mobil WHERE kd_mobil = '$kd_mobil'";
$query = mysqli_query($db_link, $sql);
$data = mysqli_fetch_array($query);

$query_kategori = "SELECT * FROM kategori";
$result_kategori = mysqli_query($db_link, $query_kategori);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rental Mobil - Edit Data Mobil</title>
    <style>
        /* Your existing styles */
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
        input[type="file"],
        input[type="submit"],
        input[type="button"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <h2>EDIT DATA MOBIL</h2>
    <br>
    <form action='aksi_edit_mobil.php?id=<?php echo $data['kd_mobil']; ?>' method='POST' enctype='multipart/form-data'>
        <table>
            <tr>
                <td>KD MOBIL</td>
                <td><input name='kd_mobil' type='text' id="kd_mobil" value="<?php echo $data['kd_mobil'] ?>" readonly></td>
            </tr>
            <tr>
                <td>MERK MOBIL</td>
                <td>
                    <select name="merk_mobil" id="merk_mobil">
                        <option value="DAIHATSU" <?php echo $data['merk_mobil'] == 'DAIHATSU' ? 'selected' : ''; ?>>DAIHATSU</option>
                        <option value="TOYOTA" <?php echo $data['merk_mobil'] == 'TOYOTA' ? 'selected' : ''; ?>>TOYOTA</option>
                        <option value="TESLA" <?php echo $data['merk_mobil'] == 'TESLA' ? 'selected' : ''; ?>>TESLA</option>
                        <option value="MITSUBISHI" <?php echo $data['merk_mobil'] == 'MITSUBISHI' ? 'selected' : ''; ?>>MITSUBISHI</option>
                        <option value="MINI" <?php echo $data['merk_mobil'] == 'MINI' ? 'selected' : ''; ?>>MINI</option>
                        <option value="MERCEDES" <?php echo $data['merk_mobil'] == 'MERCEDES' ? 'selected' : ''; ?>>MERCEDES</option>
                        <option value="HYUNDAI" <?php echo $data['merk_mobil'] == 'HYUNDAI' ? 'selected' : ''; ?>>HYUNDAI</option>
                        <option value="HONDA" <?php echo $data['merk_mobil'] == 'HONDA' ? 'selected' : ''; ?>>HONDA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>TYPE MOBIL</td>
                <td><select name="type_mobil" id="type_mobil">
                        <option value="<?php echo $data['type_mobil']; ?>"><?php echo $data['type_mobil']; ?></option>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID KATEGORI</td>
                <td>
                    <select name="id_kategori" id="kategori">
                        <?php
                        while ($row = mysqli_fetch_assoc($result_kategori)) {
                            $selected = $row['id_kategori'] == $data['id_kategori'] ? 'selected' : '';
                            echo "<option value='" . $row['id_kategori'] . "' $selected>" . $row['kategori'] . "</option>";
                        }
                        mysqli_free_result($result_kategori);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>HARGA SEWA</td>
                <td><input name='harga_sewa' type='text' id="harga_sewa" value="<?php echo $data['harga_sewa'] ?>"></td>
            </tr>
            <tr>
                <td>FOTO</td>
                <td>
                    <input name='foto' type='file' id="foto">
                    <input type="hidden" name="foto_lama" value="<?php echo $data['foto']; ?>">
                    <br>
                    <?php if ($data['foto']) { ?>
                        <img src="img/<?php echo $data['foto']; ?>" alt="Current Photo" style="max-width: 200px;">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Simpan'>
                    <a href="datamobil.php"><input type='button' value='Batal'></a>
                </td>
            </tr>
        </table>
    </form>
    <script>
        const carTypes = {
            DAIHATSU: ["TERIOS", "XENIA", "AYLA", "SIGRA"],
            TOYOTA: ["AVANZA", "FORTUNER", "ALPHARD", "KIJANG INNOVA", "HIACE", "AGYA"],
            TESLA: ["MODEL X", "MODEL S", "MODEL 3"],
            MITSUBISHI: ["XPANDER", "PAJERO SPORT", "XPORCE", "XPANDER CROSA", "PAJERO SPORT ELITE", "TRITON"],
            MINI: ["COUNTRYMAN", "3 DOOR", "5 DOOR", "CLUBMAN"],
            MERCEDES: ["C-CLASS SEDAN", "SPRINTER", "GLE-CLASS"],
            HYUNDAI: ["CRETA", "PALISADE", "KONA ELECTRIC", "STARGAZER"],
            HONDA: ["BRIO", "CIVIC", "HR-V", "BR-V"]
        };

        function updateCarTypes() {
            const merkSelect = document.getElementById('merk_mobil');
            const typeSelect = document.getElementById('type_mobil');
            const selectedMerk = merkSelect.value;

            // Clear previous options
            typeSelect.innerHTML = "";

            // Populate new options
            if (carTypes[selectedMerk]) {
                carTypes[selectedMerk].forEach(type => {
                    const option = document.createElement('option');
                    option.value = type;
                    option.text = type;
                    typeSelect.add(option);
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            updateCarTypes(); // Initial population
            document.getElementById('merk_mobil').addEventListener('change', updateCarTypes);
        });
    </script>
</body>
</html>
