<?php
// include database connection file
include 'koneksi.php';
$kode = $_POST['kode'];
$matkul = $_POST['matkul'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$ruangan = $_POST['ruangan'];
$dosen = $_POST['dosen'];
$result = mysqli_query($koneksi, "UPDATE jadwal SET
matkul='$matkul',tanggal='$tanggal',jam='$jam',ruangan='$ruangan',dosen='$dosen' WHERE kode='$kode'");
// Redirect to homepage to display updated user in list
header("Location: pegawai.php");
?>