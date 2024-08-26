<?php
include 'koneksi.php'
?>
<!DOCTYPE HTML>
<html>
<head>
<title>rental mobil</title>
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

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        animation: slideIn 0.5s ease;
    }

    th {
        background-color: #674188;
        color: #fff;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    th:hover {
        background-color: #5f9ea0;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
        transition: all 0.3s ease;
    }

    tr:hover {
        background-color: #ddd;
    }

    td:hover {
        background-color: #f5f5f5;
    }

    tr {
        transition: transform 0.5s ease;
    }

    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
    }

     input[type="button"] {
        padding: 10px 20px;
        background-color: #2E236C;
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-bottom: 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="button"]:hover {
        background-color: #2E236C;
        transform: scale(1.05);
    }

    .btn-edit, .btn-delete {
        
       padding: 8px 16px;
        margin-right: 20px;
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: transform 0.2s ease;
    }

    .btn-edit {
        background-color: #BE9FE1;
    }

    .btn-delete {
        background-color: #424874;
    }

    .btn-edit:hover, .btn-delete:hover {
        transform: scale(1.1);
    }

    @keyframes slideIn {
        from {
            margin-top: -50px;
            opacity: 0;
        }
        to {
            margin-top: 0;
            opacity: 1;
        }
    }

    a {
        text-decoration: none;
        color: #333;
        margin: 0 5px;
    }

    a:hover {
        color: white;
    }

    img {
        max-width: 100px;
        max-height: 100px;
        transition: transform 0.3s ease;
    }

    img:hover {
        transform: scale(1.1);
    }
</style>

</head>
<body>
	<h2>DATA MOBIL</h2>

	<br>
    <center><input type="button" value="Tambah Data" onClick="location.href='tambahmobil.php'"></center>
    <br>
    <table scope="col" class="table-light" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr align="center">
    <th>KD MOBIL</th>
    <th>MERK MOBIL</th>
    <th>TYPE MOBIL</th>
    <th>KATEGORI</th>
    <th>HARGA SEWA</th>
    <th>FOTO</th>
	<th>AKSI</th>
  </tr>
  
  <?php
 $no=1;
 $sql="SELECT data_mobil.kd_mobil,
 data_mobil.merk_mobil,data_mobil.type_mobil,data_mobil.harga_sewa,data_mobil.foto,kategori.id_kategori,
 kategori.kategori AS kate
  FROM data_mobil JOIN kategori ON data_mobil.id_kategori=kategori.id_kategori";

 $query=mysqli_query($db_link,$sql);
 while($data=mysqli_fetch_array($query))
 {
 ?>
       <tr>
    <td><?php echo "$data[kd_mobil]"; ?></td>
    <td><?php echo "$data[merk_mobil]"; ?></td>
    <td><?php echo "$data[type_mobil]";?></td>
    <td><?php echo "$data[kate]";?></td>
	<td><?php echo "$data[harga_sewa]";?></td>
	 <td><img src="img/<?= $data["foto"]; ?>" height="100"></td>
	 <td>
  <a class="btn-edit" href="editmobil.php?id=<?php echo "$data[kd_mobil]"; ?>">EDIT</a>
   <a class="btn-delete" href="hapusmobil.php?id=<?php echo "$data[kd_mobil]"; ?>" onClick="return confirm('Anda yakin?')">HAPUS</a>
    </td>
    </tr>
    <?php
	$no++;
	}
?>
</table>
<center><input type="button" value="Kembali" onClick="location.href='home.php'"></center>
</body>
</html>
	
    
