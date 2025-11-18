<?php 
include "koneksi.php";
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id'");
echo "<script>alert('Barang berhasil dihapus');window.location='barang_tampil.php';</script>";
?>
