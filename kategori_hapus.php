<?php
include "koneksi.php";

$id = $_GET['id'];

$cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_kategori='$id'");

if(mysqli_num_rows($cek) > 0){
   
    echo "<script>
            alert('Kategori TIDAK BISA DIHAPUS karena masih kategori masi dipakai oleh barang');
            window.location='kategori_tampil.php';
          </script>";
    exit;
}

$hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

if($hapus){
    echo "<script>
            alert('Kategori berhasil dihapus.');
            window.location='kategori_tampil.php';
          </script>";
}else{
    echo "<script>
            alert('Terjadi error saat menghapus kategori.');
            window.location='kategori_tampil.php';
          </script>";
}
?>
