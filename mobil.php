<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['LOGIN'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama Rental Mobil</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('img/mobil2.png');
            background-size: cover;
            background-position: center;
        }
        .overlay {
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            padding-top: 20px;
            position: relative;
        }
        .container {
            text-align: center;
            color: white;
        }
        .container h1 {
            font-size: 4em;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            gap: 20px;
        }
        .button {
            background-color: #292b2c;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            font-size: 16px;
            margin: 10px 20px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #555555;
        }
        
        .logout {
            position: absolute;
            top: 30px;
            right: 30px;
            background-color: transparent;
            border-radius: 12px;
        }
        .logout:hover {
            background-color: rgba(0, 0, 0, 0.1);
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="logout">
            <a href="logout.php" class="button">Logout</a>
        </div>
        <div class="container">
            <h1>Selamat Datang Di Rental</h1>
            <div class="buttons">
                <a href="datamobil.php" class="button"> Data Mobil</a>
                <a href="datacostumer.php" class="button"> Data Customer</a>
                <a href="transaksi.php" class="button">Transaksi</a>
                <a href="kategori.php" class="button"> Kategori</a>
                <a href="biodata.html" class="button"> Biodata</a>
            </div>
        </div>
    </div>
</body>
</html>
