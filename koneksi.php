<?php
$host     = "localhost";
$user     = "root";
$pass     = "";
$db       = "m.hafizh_hendry_xii_pplg1_inventaris";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
