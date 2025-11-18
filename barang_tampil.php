<?php 
include "koneksi.php";

$keyword = isset($_GET['cari']) ? $_GET['cari'] : "";

$query = "
    SELECT barang.*, kategori.kategori_barang 
    FROM barang 
    JOIN kategori ON barang.id_kategori = kategori.id_kategori
    WHERE barang.nama_barang LIKE '%$keyword%'
       OR kategori.kategori_barang LIKE '%$keyword%'
    ORDER BY id_barang DESC
";

$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
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
        background: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        margin-right: 5px;
    }
    .btn:hover {
        background: #45a049;
    }

    .search-box {
        margin: 20px 0;
        display: flex;
        gap: 10px;
    }
    .search-box input {
        padding: 10px;
        width: 280px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }
    .search-box button {
        padding: 10px 20px;
        border: none;
        background: #4CAF50;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
    }
    .search-box button:hover {
        background: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border: 1px solid #ccc;
        border-radius: 6px;
        overflow: hidden;
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

<h2>Data Barang</h2>

<div class="btn-group">
    <a href="barang_tambah.php" class="btn">+ Tambah Barang</a>
    <a href="index.php" class="btn btn-kembali">← Kembali</a>
</div>


<form method="GET" class="search-box">
    <input type="text" name="cari" placeholder="Cari nama barang / kategori..." value="<?= $keyword ?>">
    <button type="submit">Cari</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>  
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Tanggal Masuk</th>
        <th>Aksi</th>
    </tr>

    <?php 
    while($b = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?= $b['id_barang']; ?></td>
        <td><?= $b['nama_barang']; ?></td>
        <td><?= $b['kategori_barang']; ?></td>
        <td><?= $b['jumlah_stok']; ?></td>
        <td>Rp <?= number_format($b['harga_barang'], 0, ',', '.'); ?></td>
        <td><?= $b['tanggal_masuk']; ?></td>
        <td class="aksi">
            <a href="barang_edit.php?id=<?= $b['id_barang']; ?>">Edit</a> |
            <a href="barang_hapus.php?id=<?= $b['id_barang']; ?>" onclick="return confirm('Yakin hapus barang ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>


</body>
</html>
