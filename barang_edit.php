<?php 
include "koneksi.php";
$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($koneksi, 
    "SELECT * FROM barang WHERE id_barang='$id'"
));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 1px;
        }

        .container {
            max-width: 430px;
            margin: auto;
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-back {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #e0e0e0;
            color: #333;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            border: 1px solid #ccc;
            transition: 0.2s;
            font-weight: bold;
        }

        .btn-back:hover {
            background: #d5d5d5;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 22px;
        }

        label {
            font-weight: bold;
            color: #444;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background: #45a049;
        }
    </style>

</head>
<body>

<div class="container">

    <a href="baranf_tampil.php" class="btn-back">← Kembali</a>

    <h2>Edit Barang</h2>

    <form method="post">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" required>

        <label>Kategori</label>
        <select name="id_kategori" required>
            <?php 
            $kat = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori_barang ASC");
            while($k = mysqli_fetch_array($kat)){
                $selected = ($k['id_kategori'] == $data['id_kategori']) ? "selected" : "";
                echo "<option value='$k[id_kategori]' $selected>$k[kategori_barang]</option>";
            }
            ?>
        </select>

        <label>Jumlah Stok</label>
        <input type="number" name="jumlah_stok" value="<?= $data['jumlah_stok']; ?>" required>

        <label>Harga Barang</label>
        <input type="number" name="harga_barang" value="<?= $data['harga_barang']; ?>" required>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" value="<?= $data['tanggal_masuk']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>

</div>

<?php
if (isset($_POST['update'])) {
    $nama    = $_POST['nama_barang'];
    $kategori= $_POST['id_kategori'];
    $stok    = $_POST['jumlah_stok'];
    $harga   = $_POST['harga_barang'];
    $tanggal = $_POST['tanggal_masuk'];

    mysqli_query($koneksi, "UPDATE barang SET
        nama_barang='$nama',
        id_kategori='$kategori',
        jumlah_stok='$stok',
        harga_barang='$harga',
        tanggal_masuk='$tanggal'
        WHERE id_barang='$id'
    ");

    echo "<script>alert('Barang berhasil diubah');window.location='barang_tampil.php';</script>";
}
?>

</body>
</html>
