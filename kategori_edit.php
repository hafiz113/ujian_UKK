<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'"));
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f4f6;
        padding: 20px;
    }

    .container {
        width: 400px;
        margin: auto;
        background: white;
        padding: 25px 30px;
        border-radius: 12px;
        position: relative;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 22px;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        width: 100%;
    }

    button {
        background: #4CAF50;
        border: none;
        padding: 10px;
        border-radius: 6px;
        color: white;
        font-size: 15px;
        cursor: pointer;
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

<div class="container">

    <a href="kategori_tampil.php" class="btn-back">← Kembali</a>

    <h2>Edit Kategori</h2>

    <form method="post">
        <label>Nama Kategori:</label>
        <input type="text" name="kategori_barang" value="<?= $data['kategori_barang']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>

</div>

<?php
if (isset($_POST['update'])) {
    $kategori = $_POST['kategori_barang'];

    mysqli_query($koneksi, "UPDATE kategori SET kategori_barang='$kategori' WHERE id_kategori='$id'");
    echo "<script>alert('Kategori berhasil diubah');window.location='kategori_tampil.php';</script>";
}
?>
