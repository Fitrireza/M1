<?php
// include database connection file
include 'koneksi.php';
$kode = $_GET['kode'];
$result = mysqli_query($koneksi, "DELETE FROM jadwal WHERE kode='$kode'");
header("Location:jadwal.php");
?>