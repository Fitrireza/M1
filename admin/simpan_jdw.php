<?php
include 'koneksi.php';
$kode = $_POST['kode'];
$matkul = $_POST['matkul'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$ruangan = $_POST['ruangan'];
$dosen = $_POST['dosen'];
$input = mysqli_query($koneksi,"INSERT INTO jadwal
VALUES('$kode','$matkul','$tanggal','$jam' ,'$ruangan' ,'$dosen')") or die(mysqli_error($koneksi));
if($input){
echo "Data Berhasil Disimpan";
header("location:jadwal.php");
}else{
echo "Gagal Disimpan";
}
?>