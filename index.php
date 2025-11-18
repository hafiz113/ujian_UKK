<?php
include "koneksi.php";

$q1 = mysqli_query($koneksi, "SELECT COUNT(*) AS total_jenis FROM barang");
$r1 = mysqli_fetch_assoc($q1);

$q2 = mysqli_query($koneksi, "SELECT SUM(jumlah_stok) AS total_stok FROM barang");
$r2 = mysqli_fetch_assoc($q2);

$q3 = mysqli_query($koneksi, "SELECT SUM(harga_barang * jumlah_stok) AS total_nilai FROM barang");
$r3 = mysqli_fetch_assoc($q3);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Inventaris</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background: #eef1f4;
    }

    .header {
        background: linear-gradient(135deg, #4CAF50, #2e8b40);
        padding: 25px;
        color: white;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }
    .header h1 {
        margin: 0;
        font-size: 32px;
        font-weight: bold;
    }
    .subtext {
        opacity: 0.9;
        font-size: 15px;
        margin-top: 5px;
    }

    .container {
        padding: 25px;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        background: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        margin-right: 8px;
        transition: 0.2s;
    }
    .btn:hover {
        background: #43a047;
        transform: translateY(-2px);
    }

    .card-container {
        display: flex;
        gap: 25px;
        margin-top: 25px;
        flex-wrap: wrap;
    }

    .card {
        flex: 1;
        min-width: 250px;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        border-left: 6px solid #4CAF50;
        transition: 0.25s ease;
        position: relative;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }

    .icon {
        font-size: 35px;
        opacity: 0.25;
        position: absolute;
        right: 15px;
        bottom: 15px;
    }

    .card h3 {
        margin: 0;
        font-size: 17px;
        color: #444;
        text-transform: uppercase;
        font-weight: bold;
    }

    .card p {
        margin: 12px 0 0 0;
        font-size: 30px;
        font-weight: bold;
    }

</style>
</head>
<body>

<div class="header">
    <h1>Dashboard Inventaris</h1>
    <div class="subtext">Ringkasan data barang & kategori secara keseluruhan</div>
</div>

<div class="container">


    <a href="barang_tampil.php" class="btn">Data Barang</a>
    <a href="kategori_tampil.php" class="btn">Kategori</a>

    <div class="card-container">

        <div class="card">
            <h3>Total Jenis Kategori</h3>
            <p><?= $r1['total_jenis']; ?></p>
            <div class="icon">📦</div>
        </div>

        <div class="card">
            <h3>Total Semua Barang</h3>
            <p><?= number_format($r2['total_stok']); ?></p>
            <div class="icon">📊</div>
        </div>

        <div class="card">
            <h3>Total Nilai Semua Barang</h3>
            <p>Rp <?= number_format($r3['total_nilai'], 0, ',', '.'); ?></p>
            <div class="icon">💰</div>
        </div>

    </div>

</div>

</body>
</html>
