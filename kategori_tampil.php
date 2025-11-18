<?php 
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f4f6;
        padding: 20px;
    }

    h2 {
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }

    .btn {
        display: inline-block;
        padding: 9px 14px;
        background: #4CAF50; /* hijau */
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        margin-right: 5px;
    }
    .btn:hover {
        background: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border: 1px solid #ccc;
        border-radius: 6px;
        overflow: hidden;
        margin-top: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
        font-size: 14px;
    }

    th {
        background: #4CAF50;
        color: white;
        text-transform: uppercase;
    }

    tr:hover {
        background: #f9f9f9;
    }

    .aksi a {
        font-weight: bold;
        text-decoration: none;
        margin-right: 8px;
    }
    .aksi a:first-child {
        color: #2196F3;
    }
    .aksi a:last-child {
        color: #e63946;
    }
    .aksi a:hover {
        text-decoration: underline;
    }

</style>
</head>
<body>

<h2>Data Kategori</h2>

<div class="btn-group">
    <a href="kategori_tambah.php" class="btn">+ Tambah Kategori</a>
    <a href="index.php" class="btn">← Kembali</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>

    <?php 
    while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?= $d['id_kategori']; ?></td>
        <td><?= $d['kategori_barang']; ?></td>
        <td class="aksi">
            <a href="kategori_edit.php?id=<?= $d['id_kategori']; ?>">Edit</a> |
            <a href="kategori_hapus.php?id=<?= $d['id_kategori']; ?>" onclick="return confirm('Hapus kategori?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

