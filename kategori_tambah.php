<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 20px;
        }

        .container {
            width: 420px;
            margin: auto;
            background: #fff;
            padding: 25px 28px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: relative;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 22px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #444;
            font-size: 14px;
            margin-bottom: 6px;
            display: block;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background: #fafafa;
        }

        button {
            width: 100%;
            padding: 12px;
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

    <a href="kategori_tampil.php" class="btn-back">← Kembali</a>

    <h2>Tambah Kategori</h2>

    <form method="post">
        <label>Nama Kategori</label>
        <input type="text" name="kategori_barang" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>

</div>

<?php
if (isset($_POST['simpan'])) {
    $kategori = $_POST['kategori_barang'];

    mysqli_query($koneksi, "INSERT INTO kategori (kategori_barang) VALUES ('$kategori')");
    echo "<script>alert('Kategori berhasil ditambahkan');window.location='kategori_tampil.php';</script>";
}
?>

</body>
</html>
