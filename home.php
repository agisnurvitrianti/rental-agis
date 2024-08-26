<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(#A6B1E1, rgba(0, 0, 0, 0.5)), url('img/mobil2.png') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            overflow: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
        }

        h1 {
            font-size: 3.5rem;
            letter-spacing: 3px;
            margin-bottom: 20px;
            animation: fadeInDown 1.5s ease-in-out;
        }

        .buttons {
            display: flex;
            gap: 20px;
            animation: fadeInUp 1.5s ease-in-out;
        }

        .button {
            background-color: #424874;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 10px 20px;
            cursor: pointer;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: #424874;
        }

        .button:hover {
            background-color: #424874;
            transform: translateY(-5px);
            box-shadow: #424874;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 30px;
            padding: 10px 20px;
            background-color: #EFBBCF;
            color: white;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #EFBBCF;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Car Rental</h1>
        <div class="buttons">
            <a href="datamobil.php" class="button">Data Mobil</a>
            <a href="datacostumer.php" class="button">Data Customer</a>
            <a href="transaksi.php" class="button">Transaksi</a>
            <a href="kategori.php" class="button">Kategori</a>
            <a href="biodata.html" class="button">Biodata</a>
        </div>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
