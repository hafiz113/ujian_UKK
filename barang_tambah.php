<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
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

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 22px;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            background: #fafafa;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
        }

        button:hover {
            background: #45a049;
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
    </style>
</head>
<body>

<div class="container">
    <a href="barang_tampil.php" class="btn-back">← Kembali</a>

    <h2>Tambah Barang</h2>

    <form method="post">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" required>

        <label>Kategori</label>
        <select name="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php 
            $kat = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori_barang ASC");
            while($k = mysqli_fetch_array($kat)){
                echo "<option value='$k[id_kategori]'>$k[kategori_barang]</option>";
            }
            ?>
        </select>

        <label>Jumlah Stok</label>
        <input type="number" name="jumlah_stok" required>

        <label>Harga</label>
        <input type="number" name="harga_barang" required>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama    = $_POST['nama_barang'];
    $kategori= $_POST['id_kategori'];
    $stok    = $_POST['jumlah_stok'];
    $harga   = $_POST['harga_barang'];
    $tanggal = $_POST['tanggal_masuk'];

    mysqli_query($koneksi, "INSERT INTO barang 
    (nama_barang, id_kategori, jumlah_stok, harga_barang, tanggal_masuk)
    VALUES ('$nama', '$kategori', '$stok', '$harga', '$tanggal')");

    echo "<script>alert('Barang berhasil ditambahkan');window.location='barang_tampil.php';</script>";
}
?>

</body>
</html>
