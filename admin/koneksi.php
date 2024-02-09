<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_akademik"; //Nama database
// Meakukan koneksi ke db akademik
$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    echo "Gagal tersambung: " . die(mysqli_error($koneksi));
}