<?php
include 'koneksi.php';
$query = "SELECT * FROM kategori";
$result = mysqli_query($db_link, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rental Mobil</title>
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
</head>
<body>
    <h2>TAMBAH DATA MOBIL</h2>
    <br>
    <form action="aksi_tambah_mobil.php" method="POST">
        <table>
            <tr>
                <td>KD MOBIL</td>
                <td><input type="text" name="kd_mobil" id="kd_mobil"></td>
            </tr>
            <tr>
                <td>MERK MOBIL</td>
                <td>
                    <select name="merk_mobil" id="merk_mobil">
                        <option value="DAIHATSU">DAIHATSU</option>
                        <option value="TOYOTA">TOYOTA</option>
                        <option value="TESLA">TESLA</option>
                        <option value="MITSUBISHI">MITSUBISHI</option>
                        <option value="MINI">MINI</option>
                        <option value="MERCEDES">MERCEDES</option>
                        <option value="HYUNDAI">HYUNDAI</option>
                        <option value="HONDA">HONDA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>TYPE MOBIL</td>
                <td><select name="type_mobil" id="type_mobil"></select></td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td><label>
                    <select name="kategori" id="kategori" size="1">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_kategori'] . "'>" . $row['kategori'] . "</option>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </label></td>
            </tr>
            <tr>
                <td>HARGA SEWA</td>
                <td><input type="text" name="harga_sewa" id="harga_sewa"></td>
            </tr>
            <tr>
                <td>FOTO</td>
                <td><input type="file" name="foto" id="foto"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Simpan">
                    <a href="datamobil.php"><input type="button" value="Batal"></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
