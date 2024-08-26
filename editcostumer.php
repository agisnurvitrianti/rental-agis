<?php
include 'koneksi.php';
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
    input[type="button"]  {
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

    input[type="submit"]:hover  {
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
        <h2><center>EDIT DATA COSTUMER</center></h2>
        <br>
        <?php
        $id_costumer=$_GET['id'];
        $sql= "SELECT * FROM data_costumer WHERE id_costumer = '$id_costumer'";
        $query = mysqli_query($db_link,$sql);
        $data = mysqli_fetch_array($query);
?>
<form action='aksi_edit_costumer.php?id=<?php echo "id_costumer"; ?>' method='POST'>
    <table border="0">
    <td>ID COSTUMER</td>
    <td><input name='id_costumer' type='text' id="id_costumer" value="<?php echo $data['id_costumer'] ?>"></td>
    </tr>
    <tr>
    <td>NAMA COSTUMER</td>
    <td><input name='nama_costumer' type='text' id="nama_costumer" value="<?php echo $data['nama_costumer'] ?>"></td>
    </tr>
    <tr>
    <td>ALAMAT COSTUMER</td>
    <td><input name='alamat_costumer' type='text' id="alamat_costumer" value="<?php echo $data['alamat_costumer'] ?>"></td>
    </tr>
        <tr>
    <td>NO HP</td>
    <td><input name='no_hp' type='text' id="no_hp" value="<?php echo $data['no_hp'] ?>"></td>
    </tr>
    <tr>
   
    <td></td>
    <td><input type='submit' value='simpan'>
    <a href="datacostumer.php"><input type='button' value='batal'></a></td>
    </tr>
    </table>
    </form>
    </body>
</html>